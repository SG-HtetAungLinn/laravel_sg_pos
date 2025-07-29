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
use App\Http\Requests\Product\ProductCreateRequest;
use Intervention\Image\Drivers\Gd\Driver;

class ProductController extends Controller
{
    public function list(Request $request)
    {
        // $products = Product::select('products.*', 'product_images.image')
        //     ->leftJoin('product_images', 'product_images.product_id', '=', 'products.id')
        //     ->groupBy('products.id')
        //     ->get();
        $products = Product::select('products.*', DB::raw('MIN(product_images.image) as image'))
            ->leftJoin('product_images', 'product_images.product_id', '=', 'products.id')
            ->groupBy('products.id')
            ->get();
        return view('admin.product.index', compact('products'));
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
        return view('admin.product.image_create', compact('id'));
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
                    'image' => $fullPath,
                ]);
            }
        }
        return to_route('product.list')->with(['success' => "Product Create Success"]);
    }
}
