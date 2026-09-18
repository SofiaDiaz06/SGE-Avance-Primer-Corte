<x-app-layout>
    <x-slot name="header">
        <h2 style="color: #0b1654;" class="font-bold text-xl leading-tight">
            {{ __('Módulo de Productos - Paraíso Distribuciones S.A.S.') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border border-gray-200">

                {{-- Encabezado con botón de crear --}}
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-6 pb-4 border-b border-gray-200">
                    <h3 style="color: #0b1654;" class="text-lg font-bold flex items-center gap-2">
                        <i style="color: #c83232;" class="fas fa-boxes"></i> Listado de Productos
                    </h3>
                    <a href="{{ route('productos.create') }}"
                       style="background-color: #c83232;"
                       class="hover:opacity-90 text-white rounded-lg font-bold text-sm shadow px-5 py-2.5 transition inline-flex items-center gap-2">
                        <i class="fas fa-plus"></i> Nuevo Producto
                    </a>
                </div>

                {{-- Mensaje de éxito --}}
                @if (session('success'))
                    <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-600 rounded-r-md text-emerald-900 flex items-center shadow-xs">
                        <i class="fas fa-check-circle text-xl mr-3 text-emerald-600"></i> 
                        <span class="font-semibold">{{ session('success') }}</span>
                    </div>
                @endif

                {{-- Tabla de productos --}}
                @if ($products->isEmpty())
                    <div class="text-center py-12 text-gray-500">
                        <i class="fas fa-inbox text-5xl mb-4 text-gray-300"></i>
                        <p class="text-lg font-medium">No hay productos registrados aún.</p>
                        <a href="{{ route('productos.create') }}"
                           style="color: #c83232;"
                           class="mt-4 inline-block font-bold hover:underline">
                            Crear el primer producto
                        </a>
                    </div>
                @else
                    <div class="overflow-x-auto rounded-lg border border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead style="background-color: #0b1654;" class="text-white">
                                <tr>
                                    <th class="px-4 py-3.5 text-left text-xs font-bold uppercase tracking-wider">ID</th>
                                    <th class="px-4 py-3.5 text-left text-xs font-bold uppercase tracking-wider">Identificación</th>
                                    <th class="px-4 py-3.5 text-left text-xs font-bold uppercase tracking-wider">Nombre</th>
                                    <th class="px-4 py-3.5 text-left text-xs font-bold uppercase tracking-wider">Categoría</th>
                                    <th class="px-4 py-3.5 text-right text-xs font-bold uppercase tracking-wider">Precio</th>
                                    <th class="px-4 py-3.5 text-center text-xs font-bold uppercase tracking-wider">Stock</th>
                                    <th class="px-4 py-3.5 text-center text-xs font-bold uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($products as $product)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-4 py-3 text-sm text-gray-500 font-medium">{{ $product->id_producto }}</td>
                                        <td style="color: #0b1654;" class="px-4 py-3 text-sm font-mono font-bold">{{ $product->identificacion }}</td>
                                        <td class="px-4 py-3 text-sm font-bold text-gray-900">{{ $product->nombre }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">
                                            <span class="bg-gray-100 text-gray-800 px-2.5 py-1 rounded-md text-xs font-semibold">
                                                {{ $product->category->nombre ?? 'Sin categoría' }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-sm text-right font-bold text-gray-900">
                                            ${{ number_format($product->precio, 0, ',', '.') }}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-center">
                                            <span class="px-3 py-1 rounded-full text-xs font-extrabold {{ $product->stock > 10 ? 'bg-emerald-100 text-emerald-800' : 'bg-red-100 text-red-700' }}">
                                                {{ $product->stock }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            <div class="flex justify-center items-center gap-3">
                                                <a href="{{ route('productos.edit', $product->id_producto) }}"
                                                   class="text-amber-600 hover:text-amber-800 transition p-1" title="Editar">
                                                    <i class="fas fa-edit text-lg"></i>
                                                </a>
                                                <form action="{{ route('productos.destroy', $product->id_producto) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('¿Estás seguro de eliminar este producto?');"
                                                      class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="color: #c83232;" class="hover:text-red-800 transition p-1" title="Eliminar">
                                                        <i class="fas fa-trash-alt text-lg"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Paginación / Registros --}}
                    <div class="mt-5 pt-3 flex justify-between items-center text-sm text-gray-500">
                        @if ($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            {{ $products->links() }}
                        @else
                            <p class="text-sm text-gray-600">
                                Total: <strong style="color: #0b1654;">{{ $products->count() }}</strong> productos registrados.
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>