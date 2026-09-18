<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Lista todos los productos.
     */
    public function index()
    {
        // Eager Loading con with() + scope conStock() para evitar N+1
        $products = Product::with('category')->conStock()->get();

        return view('productos.index', compact('products'));
    }

    /**
     * Muestra el formulario de creación.
     */
    public function create()
    {
        $categories = Category::all();

        return view('productos.create', compact('categories'));
    }

    /**
     * Guarda un nuevo producto.
     */
    public function store(Request $request)
    {
        $request->validate([
            'identificacion' => 'required|string|max:255|unique:products,identificacion',
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'id_categoria' => 'required|exists:categories,id',
        ]);

        Product::create($request->all());

        return redirect()->route('productos.index')
                         ->with('success', 'Producto creado correctamente.');
    }

    /**
     * Muestra un producto específico.
     */
    public function show(string $id)
    {
        $product = Product::with('category')->findOrFail($id);

        return view('productos.show', compact('product'));
    }

    /**
     * Muestra el formulario de edición.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('productos.edit', compact('product', 'categories'));
    }

    /**
     * Actualiza un producto.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'identificacion' => 'required|string|max:255|unique:products,identificacion,' . $id . ',id_producto',
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'id_categoria' => 'required|exists:categories,id',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('productos.index')
                         ->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Elimina un producto.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('productos.index')
                         ->with('success', 'Producto eliminado correctamente.');
    }
}