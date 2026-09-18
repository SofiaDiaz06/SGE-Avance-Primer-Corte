<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ __('Módulo de Ventas - Paraíso Distribuciones S.A.S.') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 border border-slate-200">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                        <i class="fas fa-shopping-cart text-blue-900"></i> Listado de Ventas
                    </h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-slate-100">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-bold text-slate-700 uppercase">ID</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-slate-700 uppercase">Fecha</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-slate-700 uppercase">Cliente</th>
                                <th class="px-4 py-3 text-right text-xs font-bold text-slate-700 uppercase">Total</th>
                                <th class="px-4 py-3 text-center text-xs font-bold text-slate-700 uppercase">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($sales as $sale)
                                <tr class="hover:bg-slate-50">
                                    <td class="px-4 py-3 text-sm text-slate-600">{{ $sale->id_venta }}</td>
                                    <td class="px-4 py-3 text-sm text-slate-600">{{ $sale->fecha }}</td>
                                    <td class="px-4 py-3 text-sm font-medium text-slate-800">{{ $sale->client->nombre ?? '—' }}</td>
                                    <td class="px-4 py-3 text-sm text-right text-slate-700">${{ number_format($sale->total, 0, ',', '.') }}</td>
                                    <td class="px-4 py-3 text-center">
                                        <span class="px-2 py-1 rounded-full text-xs font-bold
                                            {{ $sale->estado_pago === 'pagado' ? 'bg-green-100 text-green-800' : '' }}
                                            {{ $sale->estado_pago === 'pendiente' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                            {{ $sale->estado_pago === 'anulado' ? 'bg-red-100 text-red-800' : '' }}">
                                            {{ ucfirst($sale->estado_pago) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 text-sm text-slate-500">
                    Total: <strong>{{ $sales->count() }}</strong> ventas registradas.
                </div>
            </div>
        </div>
    </div>
</x-app-layout>