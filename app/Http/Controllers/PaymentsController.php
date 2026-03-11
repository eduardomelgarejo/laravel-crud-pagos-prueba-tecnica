<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentsController extends Controller
{
    /**
     * Muestra el listado de todos los pagos registrados.
     */
    public function index()
    {
        $payments = Payment::all();
        return view('payments.list', compact('payments'));
    }

    /**
     * Muestra el formulario para crear un nuevo pago.
     */
    public function create()
    {
        return view('payments.create');
    }

    /**
     * Valida y almacena un nuevo pago en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|max:255',
            'price' => 'required|integer'
        ]);

        try {
            Payment::create($request->all());

            return redirect()->route('payments')
                ->with('alert-success', 'Pago creado correctamente');
        } catch (\Exception $e) {
            return back()->with('alert-error', 'Error al crear pago: ' . $e->getMessage());
        }
    }

    /**
     * Muestra el formulario para editar un pago existente.
     */
    public function edit($id)
    {
        $payment = Payment::find($id);

        if (!$payment) {
            return redirect()->route('payments')
                ->with('alert-error', 'Pago no encontrado');
        }

        return view('payments.edit', compact('payment'));
    }

    /**
     * Valida y actualiza los datos de un pago en la base de datos.
     */
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

    /**
     * Elimina un pago específico de la base de datos.
     */
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
