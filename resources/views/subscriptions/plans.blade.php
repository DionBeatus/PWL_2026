<x-app-layout>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-green-700">
                        Daftar Paket Membership
                    </h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($plans as $plan)
                        <div class="border border-gray-300 rounded-lg p-6 hover:shadow-lg transition">

                            <h3 class="text-xl font-bold text-green-700">
                                {{ $plan->name }}
                            </h3>

                            <p class="mt-3 text-gray-600">
                                {{ $plan->description }}
                            </p>

                            <p class="mt-4 text-3xl font-bold text-gray-800">
                                Rp {{ number_format($plan->price, 0, ',', '.') }}
                            </p>

                            <p class="mt-1 text-sm text-gray-500">
                                Durasi: {{ $plan->duration_days }} Hari
                            </p>

                            <form action="{{ route('subscriptions.checkout', $plan) }}"
                                method="POST"
                                class="mt-5">
                                @csrf

                                <label class="block mb-2 font-medium text-gray-700">
                                    Metode Pembayaran
                                </label>

                                <select name="payment_method"
                                    class="w-full border border-gray-300 rounded px-3 py-2 mb-4 focus:ring-green-500 focus:border-green-500">
                                    <option value="QRIS">QRIS</option>
                                    <option value="Virtual Account">Virtual Account</option>
                                    <option value="E-Wallet">E-Wallet</option>
                                </select>

                                <button type="submit"
                                    class="w-full px-4 py-2 font-semibold bg-green-600 text-white rounded hover:bg-green-700">
                                    Checkout
                                </button>
                            </form>

                        </div>
                    @endforeach
                </div>

            </div>

            <img src="{{ asset('asset/bg.png') }}"
                class="h-450 pb-50 w-auto object-contain">

        </div>
    </div>
</x-app-layout>