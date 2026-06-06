<x-app-layout>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-green-700">
                        Daftar Subscription Saya
                    </h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-300">
                        <thead class="bg-green-50 text-green-700">
                            <tr>
                                <th class="border px-4 py-2 text-center">Invoice</th>
                                <th class="border px-4 py-2 text-center">Paket</th>
                                <th class="border px-4 py-2 text-center">Total</th>
                                <th class="border px-4 py-2 text-center">Status</th>
                                <th class="border px-4 py-2 text-center">Expired</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($subscriptions as $subscription)
                                <tr>
                                    <td class="border px-4 py-2 text-center">
                                        {{ $subscription->invoice_number }}
                                    </td>

                                    <td class="border px-4 py-2 text-center">
                                        {{ $subscription->plan->name }}
                                    </td>

                                    <td class="border px-4 py-2 text-center">
                                        Rp {{ number_format($subscription->amount, 0, ',', '.') }}
                                    </td>

                                    <td class="border px-4 py-2 text-center">
                                        @if($subscription->status == 'paid')
                                            <span class="px-2 py-1 text-sm bg-green-100 text-green-700 rounded">
                                                PAID
                                            </span>
                                        @elseif($subscription->status == 'pending')
                                            <span class="px-2 py-1 text-sm bg-yellow-100 text-yellow-700 rounded">
                                                PENDING
                                            </span>
                                        @else
                                            <span class="px-2 py-1 text-sm bg-red-100 text-red-700 rounded">
                                                {{ strtoupper($subscription->status) }}
                                            </span>
                                        @endif
                                    </td>

                                    <td class="border px-4 py-2 text-center">
                                        {{ $subscription->expired_at ? $subscription->expired_at->format('d M Y') : '-' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border px-4 py-4 text-center">
                                        Belum ada data subscription.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

            <img src="{{ asset('asset/bg.png') }}"
                class="h-450 pb-50 w-auto object-contain">

        </div>
    </div>
</x-app-layout>