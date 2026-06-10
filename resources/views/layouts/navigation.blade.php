<nav class="bg-gradient-to-r from-green-200 via-white to-green-200 shadow-md p-4">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between h-16 items-center">

            <div class="flex items-center gap-3 hover:scale-105 transition duration-300">
                <img src="{{ asset('asset/bumi_only.png') }}" class="h-12 w-auto object-contain" alt="Logo">
                <span class="font-bold text-3xl bg-gradient-to-r from-green-500 to-blue-500 bg-clip-text text-transparent pb-2">
                    econscious
                </span>
            </div>

            <div class="hidden sm:flex font-bold text-lg gap-10 text-green-800 font-medium items-center">
                @if(Auth::user()->role === 'admin')

                <a href="{{ route('dashboard') }}"
                    class="relative pb-1 transition duration-300
                {{ request()->routeIs('dashboard') ? 'text-green-700' : 'hover:text-green-600' }}">
                    Dashboard
                    <span class="absolute left-0 -bottom-1 h-1 bg-green-600 rounded-full transition-all duration-300
                {{ request()->routeIs('dashboard') ? 'w-full' : 'w-0' }}">
                    </span>
                </a>

                <a href="{{ route('users.index') }}"
                    class="relative pb-1 transition duration-300
                {{ request()->routeIs('users.*') ? 'text-green-700' : 'hover:text-green-600' }}">
                    Users
                    <span class="absolute left-0 -bottom-1 h-1 bg-green-600 rounded-full transition-all duration-300
                {{ request()->routeIs('users.*') ? 'w-full' : 'w-0' }}">
                    </span>
                </a>

                <a href="{{ route('admin.subscription-report') }}"
                    class="relative pb-1 transition duration-300
                {{ request()->routeIs('admin.subscription-report') ? 'text-green-700' : 'hover:text-green-600' }}">
                    Report
                    <span class="absolute left-0 -bottom-1 h-1 bg-green-600 rounded-full transition-all duration-300
                {{ request()->routeIs('admin.subscription-report') ? 'w-full' : 'w-0' }}">
                    </span>
                </a>

                @else

                <a href="{{ route('dashboard') }}"
                    class="relative pb-1 transition duration-300
                {{ request()->routeIs('dashboard') ? 'text-green-700' : 'hover:text-green-600' }}">
                    Dashboard
                    <span class="absolute left-0 -bottom-1 h-1 bg-green-600 rounded-full transition-all duration-300
                {{ request()->routeIs('dashboard') ? 'w-full' : 'w-0' }}">
                    </span>
                </a>

                <a href="{{ route('subscriptions.plans') }}"
                    class="relative pb-1 transition duration-300
                {{ request()->routeIs('subscriptions.plans') ? 'text-green-700' : 'hover:text-green-600' }}">
                    Plans
                    <span class="absolute left-0 -bottom-1 h-1 bg-green-600 rounded-full transition-all duration-300
                {{ request()->routeIs('subscriptions.plans') ? 'w-full' : 'w-0' }}">
                    </span>
                </a>

                <a href="{{ route('subscriptions.my') }}"
                    class="relative pb-1 transition duration-300
                {{ request()->routeIs('subscriptions.my') ? 'text-green-700' : 'hover:text-green-600' }}">
                    My Subscription
                    <span class="absolute left-0 -bottom-1 h-1 bg-green-600 rounded-full transition-all duration-300
                {{ request()->routeIs('subscriptions.my') ? 'w-full' : 'w-0' }}">
                    </span>
                </a>

                @endif
            </div>

            <div class="relative">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="bg-gradient-to-r from-green-400 to-blue-400 text-white font-bold px-4 py-2 rounded-full shadow-md flex items-center gap-2 hover:scale-105 transition">
                            {{ Auth::user()->name }}
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.51a.75.75 0 01-1.08 0l-4.25-4.51a.75.75 0 01.02-1.06z" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Profile
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Logout
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

        </div>
    </div>
</nav>