<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentsController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('payments.list', compact('payments'));
    }

    public function create()
    {
        return view('payments.create');
    }

    public function edit($id)
    {
        $payment = Payment::find($id);

        if (!$payment) {
            return redirect()->route('payments')
                ->with('alert-error', 'Pago no encontrado');
        }

        return view('payments.edit', compact('payment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|max:255',
            'price' => 'required|integer'
        ]);

        $payment = Payment::find($id);

        if (!$payment) {
            return redirect()->route('payments')
                ->with('alert-error', 'Pago no encontrado');
        }

        $payment->update($request->all());

        return redirect()->route('payments')
            ->with('alert-success', 'Pago actualizado correctamente');
    }

    public function destroy($id)
    {
        $payment = Payment::find($id);

        if (!$payment) {
            return redirect()->route('payments')
                ->with('alert-error', 'Pago no encontrado');
        }

        $payment->delete();

        return redirect()->route('payments')
            ->with('alert-success', 'Pago eliminado correctamente');
    }
}
