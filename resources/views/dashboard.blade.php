<x-app-layout>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white/70 backdrop-blur-md rounded-xl px-6 py-4 shadow">
                <h2 class="font-semibold text-xl text-green-800 leading-tight">
                    {{ __('Dashboard Admin') }}
                </h2>
            </div>
        </div>
    </x-slot>
    <div class="py-2">
        <div class="min-h-screen bg-gradient-to-b from-white to-green-200 
                bg-[url('/asset/bg.png')] bg-no-repeat bg-bottom bg-contain">
            <div class="py-1 px-6 rounded-xl ">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 px-2 gap-6 mb-6">

                    <!-- Expenses -->
                    <div class="bg-yellow-200 p-5 rounded-xl shadow flex items-center justify-between hover:shadow-xl hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 ease-in-out">
                        <div>
                            <p class="text-white-800 text-sm">Pengeluaran</p>
                            <h2 class="text-2xl font-bold">
                                Rp {{ number_format($totalExpenses, 0, ',', '.') }}
                            </h2>
                        </div>
                    </div>

                    <!-- Stock -->
                    <div class="bg-green-200 p-5 rounded-xl shadow flex items-center justify-between hover:shadow-xl hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 ease-in-out">
                        <div>
                            <p class="text-white-800 text-sm">Stock</p>
                            <h2 class="text-2xl font-bold">{{ $totalStock }}</h2>
                        </div>
                    </div>

                    <!-- Penjualan -->
                    <div class="bg-blue-200 p-5 rounded-xl shadow flex items-center justify-between hover:shadow-xl hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 ease-in-out">
                        <div>
                            <p class="text-white-800 text-sm">Penjualan</p>
                            <h2 class="text-2xl font-bold">{{ $totalSales }}</h2>
                        </div>
                    </div>

                    <!-- Revenue -->
                    <div class="bg-orange-200 p-5 rounded-xl shadow flex items-center justify-between hover:shadow-xl hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 ease-in-out">
                        <div>
                            <p class="text-white-800 text-sm">Pendapatan</p>
                            <h2 class="text-2xl font-bold">
                                Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-2 mb-6">
                    <div class="bg-purple-200 p-5 rounded-xl shadow hover:shadow-xl hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 ease-in-out">
                        <h3 class="font-semibold mb-3">Stock Rendah</h3>

                        @forelse($lowStock as $product)
                        <div class="flex justify-between border-b py-2">
                            <span>{{ $product->name }}</span>
                            <span class="text-red-600 font-semibold">
                                {{ $product->stock }}
                            </span>
                        </div>
                        @empty
                        <p class="text-white-500">Stock barang aman</p>
                        @endforelse
                    </div>

                    <div class="bg-red-200 p-5 rounded-xl shadow hover:shadow-xl hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 ease-in-out">
                        <h3 class="font-semibold mb-3">Transaksi Pembelian Barang Terbaru</h3>

                        @forelse($recentPurchases as $purchase)
                        <div class="flex justify-between border-b py-2">
                            <div>
                                <p>{{ $purchase->store_name }}</p>
                                <p class="text-sm text-white-500">
                                    {{ $purchase->product->name ?? '-' }}
                                </p>
                            </div>
                            <span>
                                Rp {{ number_format($purchase->total, 0, ',', '.') }}
                            </span>
                        </div>
                        @empty
                        <p class="text-white-500">Belum ada transaksi pembelian</p>
                        @endforelse
                    </div>
                </div>
                <img src="{{ asset('asset/bg.png') }}" class="h-450 pb-50 w-auto object-contain">
            </div>
        </div>
</x-app-layout>