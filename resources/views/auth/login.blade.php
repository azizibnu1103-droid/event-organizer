<x-guest-layout>

<div class="min-h-screen bg-black overflow-hidden relative">

    {{-- BACKGROUND --}}
    <img
        src="https://images.unsplash.com/photo-1501386761578-eac5c94b800a?q=80&w=1600"
        class="absolute inset-0 w-full h-full object-cover">

    {{-- OVERLAY --}}
    <div class="absolute inset-0 bg-black/75"></div>

    {{-- GLOW --}}
    <div class="absolute top-20 left-20 w-96 h-96 bg-blue-600/30 blur-[120px] rounded-full"></div>

    <div class="absolute bottom-20 right-20 w-96 h-96 bg-purple-600/30 blur-[120px] rounded-full"></div>

    {{-- CONTENT --}}
    <div class="relative min-h-screen flex items-center justify-center px-6">

        <div class="w-full max-w-md">

            {{-- LOGO --}}
            <div class="text-center mb-10">

                <h1 class="text-6xl font-black text-white mb-4">

                    EVENT
                    <span class="text-blue-500">
                        EO
                    </span>

                </h1>

                <p class="text-gray-300 text-lg">

                    Masuk ke akun event organizer.

                </p>

            </div>


            {{-- CARD --}}
            <div class="bg-white/10 backdrop-blur-2xl border border-white/10 rounded-[35px] p-10 shadow-2xl">

                <form method="POST" action="{{ route('login') }}">

                    @csrf

                    {{-- EMAIL --}}
                    <div class="mb-6">

                        <label class="block text-gray-300 mb-3">

                            Email

                        </label>

                        <input
                            type="email"
                            name="email"
                            required
                            class="w-full bg-white/10 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-blue-500 focus:ring-0">

                    </div>


                    {{-- PASSWORD --}}
                    <div class="mb-6">

                        <label class="block text-gray-300 mb-3">

                            Password

                        </label>

                        <input
                            type="password"
                            name="password"
                            required
                            class="w-full bg-white/10 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-blue-500 focus:ring-0">

                    </div>


                    {{-- REMEMBER --}}
                    <div class="flex items-center mb-8">

                        <input
                            type="checkbox"
                            name="remember"
                            class="rounded border-white/20 bg-white/10">

                        <span class="ml-3 text-gray-300">

                            Remember me

                        </span>

                    </div>


                    {{-- BUTTON --}}
                    <button
                        type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:scale-105 transition duration-300 py-4 rounded-2xl text-lg font-bold text-white shadow-2xl">

                        LOG IN

                    </button>


                    {{-- REGISTER --}}
                    <div class="text-center mt-8">

                        <a
                            href="{{ route('register') }}"
                            class="text-gray-300 hover:text-white transition duration-300">

                            Belum punya akun?
                            <span class="text-blue-400">

                                Register

                            </span>

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</x-guest-layout>