<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ __('Editar Producto - Paraíso Distribuciones S.A.S.') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 border border-slate-200">

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                        <i class="fas fa-edit text-blue-900"></i> Editar Producto: {{ $product->nombre }}
                    </h3>
                    <a href="{{ route('productos.index') }}"
                       class="text-sm text-blue-900 hover:text-blue-700 font-medium">
                        <i class="fas fa-arrow-left mr-1"></i> Volver al listado
                    </a>
                </div>

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-md">
                        <p class="font-bold text-red-800 mb-2">Se encontraron errores:</p>
                        <ul class="list-disc list-inside text-sm text-red-700">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('productos.update', $product->id_producto) }}"
                      class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="identificacion" class="block text-sm font-medium text-gray-700">
                            Identificación <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="identificacion" id="identificacion"
                               value="{{ old('identificacion', $product->identificacion) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-900 focus:border-blue-900 text-sm"
                               required>
                        @error('identificacion')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700">
                            Nombre del Producto <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nombre" id="nombre"
                               value="{{ old('nombre', $product->nombre) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-900 focus:border-blue-900 text-sm"
                               required>
                        @error('nombre')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="id_categoria" class="block text-sm font-medium text-gray-700">
                            Categoría <span class="text-red-500">*</span>
                        </label>
                        <select name="id_categoria" id="id_categoria"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-900 focus:border-blue-900 text-sm"
                                required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                        {{ old('id_categoria', $product->id_categoria) == $category->id ? 'selected' : '' }}>
                                    {{ $category->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_categoria')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="precio" class="block text-sm font-medium text-gray-700">
                            Precio Unitario ($) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="precio" id="precio" step="0.01"
                               value="{{ old('precio', $product->precio) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-900 focus:border-blue-900 text-sm"
                               required>
                        @error('precio')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="stock" class="block text-sm font-medium text-gray-700">
                            Stock <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="stock" id="stock"
                               value="{{ old('stock', $product->stock) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-900 focus:border-blue-900 text-sm"
                               required>
                        @error('stock')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2 flex justify-end gap-3 mt-4">
                        <a href="{{ route('productos.index') }}"
                           class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 font-medium text-sm">
                            Cancelar
                        </a>
                        <button type="submit"
                                class="px-4 py-2 bg-blue-950 hover:bg-blue-900 text-white rounded-md font-bold text-sm shadow">
                            <i class="fas fa-save mr-1"></i> Actualizar Producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>