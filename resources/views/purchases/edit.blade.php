<x-app-layout>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white/70 backdrop-blur-md rounded-xl px-6 py-4 shadow">
                <h2 class="font-semibold text-xl text-green-800 leading-tight">
                    {{ __('Edit Transaksi Pembelian') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-100 shadow-sm sm:rounded-lg p-6 bg-gradient-to-b from-white to-[#CDFFC7]">
                <form action="{{ route('purchases.update', $purchase->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium mb-1 text-gray-700">Tanggal Pembelian</label>
                        <input type="date" name="purchase_date"
                            value="{{ old('purchase_date', $purchase->purchase_date) }}"
                            class="w-full border rounded px-3 py-2 bg-white focus:ring-green-500 focus:border-green-500">
                        @error('purchase_date')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block font-medium mb-1 text-gray-700">Nama Store</label>
                            <input type="text" name="store_name"
                                value="{{ old('store_name', $purchase->store_name) }}"
                                class="w-full border rounded px-3 py-2 bg-white focus:ring-green-500 focus:border-green-500">
                            @error('store_name')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-medium mb-1 text-gray-700">PIC</label>
                            <input type="text"
                                value="{{ $purchase->user->name ?? '-' }}"
                                class="w-full border rounded px-3 py-2 bg-gray-100" readonly>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block font-medium mb-2 text-gray-700">Produk yang Dibeli</label>
                        <div id="product-container" class="space-y-3">

                            @forelse($purchase->details as $detail)
                            <div class="flex flex-wrap md:flex-nowrap gap-2 items-center bg-white p-3 rounded-lg border border-green-100 product-row">
                                <div class="flex-1 min-w-[200px]">
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Pilih Produk</label>
                                    <select name="products[]" class="w-full border rounded px-3 py-2 bg-white product-select" required>
                                        <option value=""></option>
                                        @foreach($products as $product)
                                        <option value="{{ $product->id }}" @selected($detail->product_id == $product->id)>
                                            {{ $product->product_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-24">
                                    <label class="block text-xs font-medium text-gray-500 mb-1 text-center">Quantity</label>
                                    <input type="number" name="quantities[]" min="1" value="{{ $detail->quantity }}"
                                        class="w-full border rounded px-3 py-2 bg-white text-center qty-input font-medium" required>
                                </div>
                                <div class="w-32">
                                    <label class="block text-xs font-medium text-gray-500 mb-1 text-center">Harga Beli</label>
                                    <input type="number" name="prices[]" min="0" value="{{ $detail->price }}"
                                        class="w-full border rounded px-3 py-2 bg-white text-center price-input font-medium" required>
                                </div>
                                <div class="pt-5">
                                    <button type="button" class="px-3 py-2 bg-red-500 text-white rounded hover:bg-red-600 text-sm remove-product-btn">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                            @empty
                            <div class="flex flex-wrap md:flex-nowrap gap-2 items-center bg-white p-3 rounded-lg border border-green-100 product-row">
                                <div class="flex-1 min-w-[200px]">
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Pilih Produk</label>
                                    <select name="products[]" class="w-full border rounded px-3 py-2 bg-white product-select" required>
                                        <option value=""></option>
                                        @foreach($products as $product)
                                        <option value="{{ $product->id }}">
                                            {{ $product->product_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-24">
                                    <label class="block text-xs font-medium text-gray-500 mb-1 text-center">Quantity</label>
                                    <input type="number" name="quantities[]" min="1" value="1"
                                        class="w-full border rounded px-3 py-2 bg-white text-center qty-input font-medium" required>
                                </div>
                                <div class="w-32">
                                    <label class="block text-xs font-medium text-gray-500 mb-1 text-center">Harga Beli</label>
                                    <input type="number" name="prices[]" min="0" value="0"
                                        class="w-full border rounded px-3 py-2 bg-white text-center price-input font-medium" required>
                                </div>
                                <div class="pt-5">
                                    <button type="button" class="px-3 py-2 bg-red-500 text-white rounded hover:bg-red-600 text-sm remove-product-btn">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                            @endforelse
                        </div>

                        <button type="button" id="add-product-btn" class="mt-3 px-3 py-1.5 bg-blue-600 text-white rounded text-sm font-medium hover:bg-blue-700 transition">
                            + Tambah Produk Berbeda
                        </button>
                    </div>

                    <div class="mb-4 border-t pt-4 border-green-100">
                        <label class="block font-medium mb-1 text-gray-700">Ongkos Kirim</label>
                        <input type="number" id="shipping_cost" name="shipping_cost" value="{{ old('shipping_cost', $purchase->shipping_cost) }}"
                            class="w-full border rounded px-3 py-2 bg-white focus:ring-green-500 focus:border-green-500">
                        @error('shipping_cost')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1 text-gray-700 font-bold">Total</label>
                        <input type="number" id="grand_total" name="total" value="{{ $purchase->total }}"
                            class="w-full border rounded px-3 py-2 bg-gray-100 text-gray-700 font-bold text-lg" readonly>
                    </div>

                    <div class="flex gap-2 border-t pt-4 border-green-200">
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition font-medium">
                            Update Transaksi
                        </button>
                        <a href="{{ route('purchases.index') }}" class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600 transition font-medium">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const container = document.getElementById('product-container');
        const shippingInput = document.getElementById('shipping_cost');
        const grandTotalInput = document.getElementById('grand_total');

        function hitungGrandTotal() {
            let subtotalItem = 0;
            const rows = container.querySelectorAll('.product-row');

            rows.forEach(row => {
                const qty = Number(row.querySelector('.qty-input').value) || 0;
                const price = Number(row.querySelector('.price-input').value) || 0;
                subtotalItem += (qty * price);
            });

            const shipping = Number(shippingInput.value) || 0;
            grandTotalInput.value = subtotalItem + shipping;
        }

        container.addEventListener('input', function(e) {
            if (e.target.classList.contains('qty-input') || e.target.classList.contains('price-input')) {
                hitungGrandTotal();
            }
        });

        shippingInput.addEventListener('input', hitungGrandTotal);

        document.getElementById('add-product-btn').addEventListener('click', function() {
            let firstRow = container.querySelector('.product-row');
            let newRow = firstRow.cloneNode(true);

            newRow.querySelector('.product-select').value = '';
            newRow.querySelector('.qty-input').value = 1;
            newRow.querySelector('.price-input').value = 0;

            newRow.querySelector('.remove-product-btn').addEventListener('click', function() {
                if (container.querySelectorAll('.product-row').length > 1) {
                    newRow.remove();
                    hitungGrandTotal();
                } else {
                    alert('Minimal harus ada 1 produk dalam transaksi!');
                }
            });

            container.appendChild(newRow);
            hitungGrandTotal();
        });

        container.querySelectorAll('.product-row').forEach(row => {
            row.querySelector('.remove-product-btn').addEventListener('click', function() {
                if (container.querySelectorAll('.product-row').length > 1) {
                    row.remove();
                    hitungGrandTotal();
                } else {
                    alert('Minimal harus ada 1 produk dalam transaksi!');
                }
            });
        });

        hitungGrandTotal();
    </script>
</x-app-layout>