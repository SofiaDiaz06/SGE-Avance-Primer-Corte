<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ __('Módulo de Productos - Paraíso Distribuciones S.A.S.') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 border border-slate-200">

                {{-- Encabezado con botón de crear --}}
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                        <i class="fas fa-boxes text-blue-900"></i> Listado de Productos
                    </h3>
                    <a href="{{ route('productos.create') }}"
                       class="px-4 py-2 bg-blue-950 hover:bg-blue-900 text-white rounded-md font-bold text-sm shadow inline-flex items-center gap-2">
                        <i class="fas fa-plus"></i> Nuevo Producto
                    </a>
                </div>

                {{-- Mensaje de éxito --}}
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-md text-green-800">
                        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                    </div>
                @endif

                {{-- Tabla de productos --}}
                @if ($products->isEmpty())
                    <div class="text-center py-12 text-slate-500">
                        <i class="fas fa-inbox text-5xl mb-4 text-slate-300"></i>
                        <p class="text-lg">No hay productos registrados aún.</p>
                        <a href="{{ route('productos.create') }}"
                           class="mt-4 inline-block text-blue-900 hover:underline">
                            Crear el primer producto
                        </a>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-slate-100">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-bold text-slate-700 uppercase">ID</th>
                                    <th class="px-4 py-3 text-left text-xs font-bold text-slate-700 uppercase">Identificación</th>
                                    <th class="px-4 py-3 text-left text-xs font-bold text-slate-700 uppercase">Nombre</th>
                                    <th class="px-4 py-3 text-left text-xs font-bold text-slate-700 uppercase">Categoría</th>
                                    <th class="px-4 py-3 text-right text-xs font-bold text-slate-700 uppercase">Precio</th>
                                    <th class="px-4 py-3 text-center text-xs font-bold text-slate-700 uppercase">Stock</th>
                                    <th class="px-4 py-3 text-center text-xs font-bold text-slate-700 uppercase">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($products as $product)
                                    <tr class="hover:bg-slate-50">
                                        <td class="px-4 py-3 text-sm text-slate-600">{{ $product->id_producto }}</td>
                                        <td class="px-4 py-3 text-sm font-mono text-slate-600">{{ $product->identificacion }}</td>
                                        <td class="px-4 py-3 text-sm font-medium text-slate-800">{{ $product->nombre }}</td>
                                        <td class="px-4 py-3 text-sm text-slate-600">
                                            {{ $product->category->nombre ?? 'Sin categoría' }}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-right text-slate-700">
                                            ${{ number_format($product->precio, 0, ',', '.') }}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-center">
                                            <span class="px-2 py-1 rounded-full text-xs font-bold {{ $product->stock > 10 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $product->stock }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            <div class="flex justify-center gap-2">
                                                <a href="{{ route('productos.edit', $product->id_producto) }}"
                                                   class="text-yellow-600 hover:text-yellow-800" title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('productos.destroy', $product->id_producto) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('¿Estás seguro de eliminar este producto?');"
                                                      class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800" title="Eliminar">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Total de registros --}}
                    <div class="mt-4 text-sm text-slate-500">
                        Total: <strong>{{ $products->count() }}</strong> productos registrados.
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>