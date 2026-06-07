<x-app-layout>
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-green-700">
                        Invoice Pembayaran
                    </h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-300">
                        <tbody>
                            <tr>
                                <td class="border px-4 py-3 font-semibold bg-green-50 text-green-700 w-1/3">
                                    Invoice
                                </td>
                                <td class="border px-4 py-3">
                                    {{ $subscription->invoice_number }}
                                </td>
                            </tr>

                            <tr>
                                <td class="border px-4 py-3 font-semibold bg-green-50 text-green-700">
                                    Paket
                                </td>
                                <td class="border px-4 py-3">
                                    {{ $subscription->plan->name }}
                                </td>
                            </tr>

                            <tr>
                                <td class="border px-4 py-3 font-semibold bg-green-50 text-green-700">
                                    Metode Pembayaran
                                </td>
                                <td class="border px-4 py-3">
                                    {{ $subscription->payment_method }}
                                </td>
                            </tr>

                            <tr>
                                <td class="border px-4 py-3 font-semibold bg-green-50 text-green-700">
                                    Total Pembayaran
                                </td>
                                <td class="border px-4 py-3 font-bold">
                                    Rp {{ number_format($subscription->amount, 0, ',', '.') }}
                                </td>
                            </tr>

                            <tr>
                                <td class="border px-4 py-3 font-semibold bg-green-50 text-green-700">
                                    Status
                                </td>
                                <td class="border px-4 py-3">
                                    {{ strtoupper($subscription->status) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    <form action="{{ route('subscriptions.pay', $subscription) }}" method="POST">
                        @csrf

                        <button type="submit"
                            class="px-6 py-2 font-semibold bg-green-600 text-white rounded hover:bg-green-700">
                            Bayar Sekarang
                        </button>
                    </form>
                </div>

            </div>

            <img src="{{ asset('asset/bg.png') }}"
                class="h-450 pb-50 w-auto object-contain">

        </div>
    </div>
</x-app-layout>