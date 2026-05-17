<x-guest-layout>
    <div class="w-full max-w-sm mx-auto">
        <!-- Brand -->
        <div class="text-center mb-6">
            <img src="{{ asset('asset/logo.png') }}" alt="Econscious" class="w-24 h-24 mx-auto object-contain drop-shadow-lg">
        </div>

        <!-- Card -->
        <div class="bg-white/90 backdrop-blur-xl shadow-[0_10px_40px_rgba(0,0,0,0.12)] rounded-[30px] px-7 py-8">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="px-2 py-2">
                    <x-input-label for="email" :value="__('Email')" class="text-sm font-semibold text-gray-700" />
                    <x-text-input id="email" class="block mt-2 w-full rounded-2xl border-gray-200 px-4 py-3 focus:border-blue-500 focus:ring-4 focus:ring-blue-200 transition" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Masukkan email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-5 px-2 py-2">
                    <x-input-label for="password" :value="__('Password')" class="text-sm font-semibold text-gray-700" />
                    <x-text-input id="password" class="block mt-2 w-full rounded-2xl border-gray-200 px-4 py-3 focus:border-blue-500 focus:ring-4 focus:ring-blue-200 transition" type="password" name="password" required autocomplete="current-password" placeholder="Masukkan password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember & Forgot Password -->
                <div class="flex items-center justify-between mt-5 px-2 py-2">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                    <a class="text-sm text-blue-600 hover:text-blue-700 hover:underline font-medium" href="{{ route('password.request') }}">
                        Lupa Password?
                    </a>
                    @endif
                </div>

                <!-- Button & Register Link -->
                <div class="mt-7 px-2 py-1">
                    <x-primary-button class="w-full justify-center py-3 rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 shadow-lg shadow-blue-200 transition duration-300">
                        {{ __('Login') }}
                    </x-primary-button>

                    <div class="text-center mt-5 text-sm text-gray-600 pt-2">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="text-blue-700 font-semibold hover:underline">
                            Daftar sekarang
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>