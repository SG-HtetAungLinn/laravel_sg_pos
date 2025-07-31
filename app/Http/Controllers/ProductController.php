<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use App\Http\Requests\Product\ProductCreateRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Discount;
use App\Models\DiscountProduct;

class ProductController extends Controller
{
    public function list(Request $request)
    {
        $categories = Category::get();
        $discounts = Discount::get();
        return view('admin.product.index', compact('categories', 'discounts'));
    }

    public function discountProduct(Request $request)
    {
        $now = Carbon::now();

        $query = Product::with([
            'category',
            'discounts' => function ($query) use ($now) {
                $query->whereDate('start_date', '<=', $now)
                    ->whereDate('end_date', '>=', $now);
            }
        ]);

        if ($request->discount) {
            $query->whereHas('discounts', function ($q) use ($request) {
                $q->where('discounts.id', $request->discount);
            });
        }

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('sale_price', 'like', '%' . $request->search . '%')
                    ->orWhere('stock_count', 'like', '%' . $request->search . '%')
                    ->orWhere('purchase_price', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->category) {
            $query->where('category_id', $request->category);
        }
        $page = 1;
        $products = $query->orderBy($request->sort_by ?? 'id', $request->sort_dir ?? 'asc')
            ->paginate(3); // paginate instead of get()

        $formatted = $products->getCollection()->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'sale_price' => $product->sale_price,
                'purchase_price' => $product->purchase_price,
                'stock_count' => $product->stock_count,
                'image' => asset('storage/product/thumb/' . $product->thumb_img),
                'category' => $product->category,
                'discounts' => $product->discounts,
                'created_at' => $product->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $product->updated_at->format('Y-m-d H:i:s'),
                'edit' => route('product.edit', $product->id),
                'imageCreate' => route('product.imageCreate', $product->id),
                'delete' => route('product.delete', $product->id),
                'details' => route('product.details', $product->id),
            ];
        });

        return response()->json([
            'success' => true,
            'products' => $formatted,
            'pagination' => [
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'per_page' => $products->perPage(),
                'total' => $products->total(),
                'next_page_url' => $products->nextPageUrl(),
                'prev_page_url' => $products->previousPageUrl(),
                'path' => $products->path(),
            ]
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }
    public function store(ProductCreateRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('thumb_img')) {
            $file  = $request->file('thumb_img');
            $fileName = $file->getClientOriginalName();
            $fileName = Carbon::now()->format('Ymd_His') . '_' . $fileName;
            $folder = 'product/thumb/';
            $fullPath = $folder . $fileName;
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }
            $manager = new ImageManager(new Driver());
            $image = $manager->read($file)->cover(300, 200);
            $savePath = storage_path('app/public/' . $fullPath);
            $image->save($savePath, quality: 100);
            $validatedData['thumb_img'] = $fileName;
        }
        $product = Product::create($validatedData);
        if ($product) {
            $id = $product->id;
            return redirect()->route('product.imageCreate', $id);
        }
    }
    public function imageCreate($id)
    {
        $image = ProductImage::where('product_id', $id)->get();
        return view('admin.product.image_create', compact('id', 'image'));
    }
    public function imageStore(Request $request, $id)
    {
        if ($request->hasFile('product_img')) {
            $files = $request->file('product_img');
            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();
                $fileName = Carbon::now()->format('Ymd_His') . '_' . $fileName;
                $folder = 'product/' . $id . '/';
                $fullPath = $folder . $fileName;
                if (!Storage::disk('public')->exists($folder)) {
                    Storage::disk('public')->makeDirectory($folder);
                }
                $manager = new ImageManager(new Driver());
                $image = $manager->read($file)->cover(300, 200);
                $watermarkPath = public_path('images/wartermark.png');
                $watermark = $manager->read($watermarkPath);
                $watermark->resize(50, 50);
                $image->place($watermark, 'bottom-right', 10, 10);

                $savePath = storage_path('app/public/' . $fullPath);
                $image->save($savePath, quality: 100);
                ProductImage::create([
                    'product_id' => $id,
                    'image' => $fileName,
                ]);
            }
        }
        return to_route('product.list')->with(['success' => "Product Create Success"]);
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories', 'id'));
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $validatedData = $request->validated();
        $product = Product::where('id', $id)->first();
        if ($request->hasFile('thumb_img')) {
            $file  = $request->file('thumb_img');
            $fileName = $file->getClientOriginalName();
            $fileName = Carbon::now()->format('Ymd_His') . '_' . $fileName;
            $folder = 'product/thumb/';
            $fullPath = $folder . $fileName;
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }
            $manager = new ImageManager(new Driver());
            $image = $manager->read($file)->cover(300, 200);
            $savePath = storage_path('app/public/' . $fullPath);
            $image->save($savePath, quality: 100);
            $validatedData['thumb_img'] = $fileName;
        } else {
            $validatedData['thumb_img'] = $product->thumb_img;
        }
        $product->update($validatedData);
        if ($product) {
            return redirect()->route('product.imageCreate', $id);
        }
    }

    public function delete($id)
    {
        $res = Product::where('id', $id)->delete();
        if ($res) {
            return back()->with(['success' => 'Product Delete Success']);
        }
    }

    public function details($id)
    {
        $product  = Product::with('category', 'productImage')->where('id', $id)->first();
        return view('admin.product.details', compact('product'));
    }
}
