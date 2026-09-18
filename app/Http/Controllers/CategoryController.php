<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->get();

        return view('categorias.index', compact('categories'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'activo' => 'boolean',
        ]);

        Category::create($request->all());

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoría creada correctamente.');
    }

    public function show(string $id)
    {
        $category = Category::with('products')->findOrFail($id);

        return view('categorias.show', compact('category'));
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        return view('categorias.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'activo' => 'boolean',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoría actualizada correctamente.');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoría eliminada correctamente.');
    }
}