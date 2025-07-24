<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Discount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Discount\DiscountCreateRequest;
use App\Http\Requests\Discount\DiscountUpdateRequest;

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
            'name' => $request->name
        ]);
        if ($res) {
            return to_route('discount.list')->with(['success' => 'Discount Update Success']);
        }
    }
}
