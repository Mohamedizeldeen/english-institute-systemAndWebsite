<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::paginate(10);
        return view('payments.index', compact('payments'));
    }
    public function show($id)
    {
        $payment = Payment::find($id);
        if ($payment) {
            return view('payments.show', compact('payment'));
        } else {
            return redirect()->route('payments.index')->with('error', 'Payment not found.');
        }
    }
    public function create()
    {
        return view('payments.create');
    }
    public function store(PaymentRequest $request)
    {
        Payment::create($request->validated());
        return redirect()->route('payments.index')->with('success', 'Payment created successfully.');
    }
    public function edit($id)
    {
        $payment = Payment::find($id);
        if ($payment) {
            return view('payments.edit', compact('payment'));
        } else {
            return redirect()->route('payments.index')->with('error', 'Payment not found.');
        }
    }
    public function update(PaymentRequest $request, $id)
    {
        $payment = Payment::find($id);
        if ($payment) {
            $payment->update($request->validated());
            return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
        } else {
            return redirect()->route('payments.index')->with('error', 'Payment not found.');
        }
    }
    public function destroy($id)
    {
        $payment = Payment::find($id);
        if ($payment) {
            $payment->delete();
            return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
        } else {
            return redirect()->route('payments.index')->with('error', 'Payment not found.');
        }
    }
}
