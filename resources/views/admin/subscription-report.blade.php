<x-app-layout>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 border border-green-600">
                    <p class="text-sm text-gray-500">Total Revenue</p>
                    <h3 class="text-2xl font-bold text-green-700">
                        Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                    </h3>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 border border-blue-600">
                    <p class="text-sm text-gray-500">Transaksi Paid</p>
                    <h3 class="text-2xl font-bold text-blue-700">
                        {{ $totalPaid }}
                    </h3>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 border border-yellow-500">
                    <p class="text-sm text-gray-500">Transaksi Pending</p>
                    <h3 class="text-2xl font-bold text-yellow-600">
                        {{ $totalPending }}
                    </h3>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 border border-purple-600">
                    <p class="text-sm text-gray-500">Total User</p>
                    <h3 class="text-2xl font-bold text-purple-700">
                        {{ $totalUsers }}
                    </h3>
                </div>

            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-green-700">
                        Daftar Transaksi Subscription
                    </h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-300">
                        <thead class="bg-green-50 text-green-700">
                            <tr>
                                <th class="border px-4 py-2 text-left">Invoice</th>
                                <th class="border px-4 py-2 text-left">User</th>
                                <th class="border px-4 py-2 text-left">Paket</th>
                                <th class="border px-4 py-2 text-left">Amount</th>
                                <th class="border px-4 py-2 text-left">Status</th>
                                <th class="border px-4 py-2 text-left">Metode</th>
                                <th class="border px-4 py-2 text-left">Paid At</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($subscriptions as $subscription)
                                <tr>
                                    <td class="border px-4 py-2">
                                        {{ $subscription->invoice_number }}
                                    </td>

                                    <td class="border px-4 py-2">
                                        {{ $subscription->user->name }}
                                    </td>

                                    <td class="border px-4 py-2">
                                        {{ $subscription->plan->name }}
                                    </td>

                                    <td class="border px-4 py-2">
                                        Rp {{ number_format($subscription->amount, 0, ',', '.') }}
                                    </td>

                                    <td class="border px-4 py-2">
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

                                    <td class="border px-4 py-2">
                                        {{ $subscription->payment_method }}
                                    </td>

                                    <td class="border px-4 py-2">
                                        {{ $subscription->paid_at ? $subscription->paid_at->format('d M Y H:i') : '-' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="border px-4 py-4 text-center">
                                        Belum ada transaksi subscription.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $subscriptions->links() }}
                </div>

            </div>

            <img src="{{ asset('asset/bg.png') }}"
                class="h-450 pb-50 w-auto object-contain">

        </div>
    </div>
</x-app-layout>