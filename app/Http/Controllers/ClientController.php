<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::withCount('sales')->get();

        return view('clientes.index', compact('clients'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'identificacion' => 'required|string|max:255|unique:clients,identificacion',
            'nombre' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'ubicacion' => 'nullable|string|max:255',
        ]);

        Client::create($request->all());

        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente creado correctamente.');
    }

    public function show(string $id)
    {
        $client = Client::with('sales')->findOrFail($id);

        return view('clientes.show', compact('client'));
    }

    public function edit(string $id)
    {
        $client = Client::findOrFail($id);

        return view('clientes.edit', compact('client'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'identificacion' => 'required|string|max:255|unique:clients,identificacion,' . $id . ',id_cliente',
            'nombre' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'ubicacion' => 'nullable|string|max:255',
        ]);

        $client = Client::findOrFail($id);
        $client->update($request->all());

        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente eliminado correctamente.');
    }
}