<nav class="fixed top-0 left-0 w-full z-50">

    <div class="max-w-7xl mx-auto px-6 pt-5">

        <div class="bg-black/40 backdrop-blur-2xl border border-white/10 rounded-3xl px-8 py-5 shadow-2xl">

            <div class="flex items-center justify-between">

                {{-- LEFT --}}
                <div class="flex items-center gap-12">

                    {{-- LOGO --}}
                    <a href="{{ route('dashboard') }}"
                       class="text-5xl font-black tracking-tight text-white">

                        EVENT
                        <span class="text-blue-500">
                            EO
                        </span>

                    </a>

                    {{-- MENU --}}
                    <div class="hidden md:flex items-center gap-8">

                        {{-- ADMIN --}}
                        @if(auth()->user()->role == 'admin')

                            <a
                                href="{{ route('dashboard') }}"
                                class="text-gray-300 hover:text-white transition duration-300">

                                Dashboard

                            </a>

                            <a
                                href="{{ route('events.index') }}"
                                class="text-gray-300 hover:text-white transition duration-300">

                                Kelola Event

                            </a>

                            <a
                                href="{{ route('admin.payments') }}"
                                class="text-gray-300 hover:text-white transition duration-300">

                                Pembayaran

                            </a>

                        @endif


                        {{-- USER --}}
                        @if(auth()->user()->role == 'user')

                            <a
                                href="{{ route('dashboard') }}"
                                class="text-gray-300 hover:text-white transition duration-300">

                                Explore

                            </a>

                            <a
                                href="{{ route('orders.index') }}"
                                class="text-gray-300 hover:text-white transition duration-300">

                                Tiket Saya

                            </a>

                        @endif

                    </div>

                </div>


                {{-- RIGHT --}}
                <div class="flex items-center gap-5">

                    {{-- USER INFO --}}
                    <div class="hidden md:block text-right">

                        <p class="text-white font-semibold">

                            {{ auth()->user()->name }}

                        </p>

                        <p class="text-gray-400 text-sm">

                            {{ auth()->user()->role }}

                        </p>

                    </div>

                    {{-- AVATAR --}}
                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-500 to-purple-500 flex items-center justify-center text-white font-bold text-lg">

                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                    </div>

                    {{-- LOGOUT --}}
                    <form
                        method="POST"
                        action="{{ route('logout') }}">

                        @csrf

                        <button
                            class="bg-red-500/20 hover:bg-red-500 text-red-300 hover:text-white px-5 py-2 rounded-2xl transition duration-300">

                            Logout

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</nav>