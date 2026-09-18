<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::withCount('purchases')->get();

        return view('proveedores.index', compact('providers'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
        ]);

        Provider::create($request->all());

        return redirect()->route('proveedores.index')
                         ->with('success', 'Proveedor creado correctamente.');
    }

    public function show(string $id)
    {
        $provider = Provider::with('purchases')->findOrFail($id);

        return view('proveedores.show', compact('provider'));
    }

    public function edit(string $id)
    {
        $provider = Provider::findOrFail($id);

        return view('proveedores.edit', compact('provider'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
        ]);

        $provider = Provider::findOrFail($id);
        $provider->update($request->all());

        return redirect()->route('proveedores.index')
                         ->with('success', 'Proveedor actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $provider = Provider::findOrFail($id);
        $provider->delete();

        return redirect()->route('proveedores.index')
                         ->with('success', 'Proveedor eliminado correctamente.');
    }
}