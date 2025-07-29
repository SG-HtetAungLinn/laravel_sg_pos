<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\PaymentType;
use App\Http\Requests\PaymentType\PaymentTypeCreateRequest;
use App\Http\Requests\PaymentType\PaymentTypeUpdateRequest;

class PaymentTypeController extends Controller
{
    public function list()
    {
        $paymentTypes = PaymentType::get();
        return view('admin.paymentType.index', compact('paymentTypes'));
    }

    public function create()
    {
        return view('admin.paymentType.create');
    }

    public function store(PaymentTypeCreateRequest $request)
    {
        try {
            $res = PaymentType::create([
                'name' => $request->name
            ]);
            if ($res) {
                return to_route('paymentType.list')->with(['success' => 'Payment Type Create Success']);
            }
        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function delete($id)
    {
        if ($id) {
            $res = PaymentType::where('id', $id)->delete();
            if ($res) {
                return back()->with(
                    ['success' => 'Payment Type Delete Success']
                );
            }
        }
    }
    public function edit($id)
    {
        $paymentType = PaymentType::find($id);
        return view('admin.paymentType.edit', compact('paymentType'));
    }
    public function update(PaymentTypeUpdateRequest $request, $id)
    {
        $res = PaymentType::where('id', $id)->update([
            'name' => $request->name
        ]);
        if ($res) {
            return to_route('paymentType.list')->with(['success' => 'Payment Type Update Success']);
        }
    }
}
