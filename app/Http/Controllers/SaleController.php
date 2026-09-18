<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('client')->orderBy('fecha', 'desc')->get();

        return view('ventas.index', compact('sales'));
    }

    public function create()
    {
        $clients = Client::all();
        $products = Product::all();

        return view('ventas.create', compact('clients', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clients,id_cliente',
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:0',
            'estado_pago' => 'required|string|max:50',
        ]);

        Sale::create($request->all());

        return redirect()->route('ventas.index')
                         ->with('success', 'Venta creada correctamente.');
    }

    public function show(string $id)
    {
        $sale = Sale::with(['client', 'products'])->findOrFail($id);

        return view('ventas.show', compact('sale'));
    }

    public function edit(string $id)
    {
        $sale = Sale::findOrFail($id);
        $clients = Client::all();

        return view('ventas.edit', compact('sale', 'clients'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clients,id_cliente',
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:0',
            'estado_pago' => 'required|string|max:50',
        ]);

        $sale = Sale::findOrFail($id);
        $sale->update($request->all());

        return redirect()->route('ventas.index')
                         ->with('success', 'Venta actualizada correctamente.');
    }

    public function destroy(string $id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('ventas.index')
                         ->with('success', 'Venta eliminada correctamente.');
    }
}