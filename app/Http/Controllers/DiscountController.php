<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\Discount\DiscountCreateRequest;
use App\Http\Requests\Discount\DiscountUpdateRequest;
use App\Models\DiscountProduct;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::get();
        return view('admin.discount.index', compact('discounts'));
    }

    public function create()
    {
        return view('admin.discount.create');
    }

    public function store(DiscountCreateRequest $request)
    {
        try {
            DB::beginTransaction();
            $res = Discount::create([
                'name'       => $request->name,
                'percent'    => $request->percent,
                'start_date' => $request->start_date,
                'end_date'   => $request->end_date,
            ]);
            DB::commit();
            return to_route('discount.index')->with(['success' => 'Discount Created Successfully']);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Discount Creation Failed: ' . $e->getMessage());
            return back()->with([
                'error' => 'Failed to create discount. Please try again.'
            ]);
        }
    }
    public function destroy($id)
    {
        if ($id) {
            $res = Discount::where('id', $id)->delete();
            if ($res) {
                return back()->with(
                    ['success' => 'Discount Delete Success']
                );
            }
        }
    }
    public function edit($id)
    {
        $discount = Discount::find($id);
        return view('admin.discount.edit', compact('discount'));
    }
    public function update(DiscountUpdateRequest $request, $id)
    {
        $res = Discount::where('id', $id)->update([
            'name'          => $request->name,
            'percent'       => $request->percent,
            'start_date'    => $request->start_date,
            'end_date'      => $request->end_date,
        ]);
        if ($res) {
            return to_route('discount.index')->with(['success' => 'Discount Update Success']);
        }
    }

    public function addItem($id)
    {
        $discount = Discount::findOrFail($id);
        $products = Product::where('stock_count', '>', 0)->get();
        $discount_products = DiscountProduct::where('discount_id', $id)->pluck('product_id')->toArray();
        return view('admin.discount.addItem', compact('discount', 'products', 'discount_products'));
    }
    public function storeItem($id, Request $request)
    {
        Validator::make($request->all(), [
            'products'  => 'array',
            'products.*' => 'exists:products,id',
        ])->validate();
        try {
            DB::beginTransaction();
            $discount = Discount::findOrFail($id);
            $discount->products()->sync($request->products);
            DB::commit();
            return to_route('discount.index')->with(['success' => 'Items Added to Discount Successfully']);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Failed to add items to discount: ' . $e->getMessage());
            return back()->with(['error' => 'Failed to add items to discount. Please try again.']);
        }
    }
}
