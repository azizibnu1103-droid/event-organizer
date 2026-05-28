<x-guest-layout>

<div class="min-h-screen bg-black overflow-hidden relative">

    {{-- BACKGROUND --}}
    <img
        src="https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?q=80&w=1600"
        class="absolute inset-0 w-full h-full object-cover">

    {{-- OVERLAY --}}
    <div class="absolute inset-0 bg-black/80"></div>

    {{-- GLOW --}}
    <div class="absolute top-20 left-20 w-96 h-96 bg-blue-600/30 blur-[120px] rounded-full"></div>

    <div class="absolute bottom-20 right-20 w-96 h-96 bg-purple-600/30 blur-[120px] rounded-full"></div>

    {{-- CONTENT --}}
    <div class="relative min-h-screen flex items-center justify-center px-6 py-20">

        <div class="w-full max-w-xl">

            {{-- LOGO --}}
            <div class="text-center mb-10">

                <h1 class="text-6xl font-black text-white mb-4">

                    EVENT
                    <span class="text-blue-500">
                        EO
                    </span>

                </h1>

                <p class="text-gray-300 text-lg">

                    Buat akun dan mulai eksplor event.

                </p>

            </div>


            {{-- CARD --}}
            <div class="bg-white/10 backdrop-blur-2xl border border-white/10 rounded-[35px] p-10 shadow-2xl">

                <form method="POST" action="{{ route('register') }}">

                    @csrf

                    {{-- NAME --}}
                    <div class="mb-6">

                        <label class="block text-gray-300 mb-3">

                            Nama

                        </label>

                        <input
                            type="text"
                            name="name"
                            required
                            class="w-full bg-white/10 border border-white/10 rounded-2xl px-5 py-4 text-white">

                    </div>


                    {{-- EMAIL --}}
                    <div class="mb-6">

                        <label class="block text-gray-300 mb-3">

                            Email

                        </label>

                        <input
                            type="email"
                            name="email"
                            required
                            class="w-full bg-white/10 border border-white/10 rounded-2xl px-5 py-4 text-white">

                    </div>


                    {{-- ROLE --}}
                    <div class="mb-6">

                        <label class="block text-gray-300 mb-3">

                            Pilih Role

                        </label>

                        <select
                            name="role"
                            required
                            class="w-full bg-zinc-900 border border-white/10 rounded-2xl px-5 py-4 text-white">

                            <option value="user">

                                User / Pembeli

                            </option>

                            <option value="admin">

                                Admin / Panitia

                            </option>

                        </select>

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
                            class="w-full bg-white/10 border border-white/10 rounded-2xl px-5 py-4 text-white">

                    </div>


                    {{-- CONFIRM --}}
                    <div class="mb-8">

                        <label class="block text-gray-300 mb-3">

                            Confirm Password

                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            required
                            class="w-full bg-white/10 border border-white/10 rounded-2xl px-5 py-4 text-white">

                    </div>


                    {{-- BUTTON --}}
                    <button
                        type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:scale-105 transition duration-300 py-4 rounded-2xl text-lg font-bold text-white shadow-2xl">

                        CREATE ACCOUNT

                    </button>


                    {{-- LOGIN --}}
                    <div class="text-center mt-8">

                        <a
                            href="{{ route('login') }}"
                            class="text-gray-300 hover:text-white transition duration-300">

                            Sudah punya akun?
                            <span class="text-blue-400">

                                Login

                            </span>

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</x-guest-layout>