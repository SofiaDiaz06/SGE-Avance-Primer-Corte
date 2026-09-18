<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ __('Módulo de Clientes - Paraíso Distribuciones S.A.S.') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 border border-slate-200">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                        <i class="fas fa-users text-blue-900"></i> Listado de Clientes
                    </h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-slate-100">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-bold text-slate-700 uppercase">ID</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-slate-700 uppercase">Identificación</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-slate-700 uppercase">Nombre</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-slate-700 uppercase">Teléfono</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-slate-700 uppercase">Ubicación</th>
                                <th class="px-4 py-3 text-center text-xs font-bold text-slate-700 uppercase">Ventas</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($clients as $client)
                                <tr class="hover:bg-slate-50">
                                    <td class="px-4 py-3 text-sm text-slate-600">{{ $client->id_cliente }}</td>
                                    <td class="px-4 py-3 text-sm font-mono text-slate-600">{{ $client->identificacion }}</td>
                                    <td class="px-4 py-3 text-sm font-medium text-slate-800">{{ $client->nombre }}</td>
                                    <td class="px-4 py-3 text-sm text-slate-600">{{ $client->telefono }}</td>
                                    <td class="px-4 py-3 text-sm text-slate-600">{{ $client->ubicacion }}</td>
                                    <td class="px-4 py-3 text-sm text-center font-bold text-blue-900">{{ $client->sales_count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 text-sm text-slate-500">
                    Total: <strong>{{ $clients->count() }}</strong> clientes registrados.
                </div>
            </div>
        </div>
    </div>
</x-app-layout>