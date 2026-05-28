<x-app-layout>

<div class="min-h-screen bg-black text-white pt-36 pb-20 overflow-hidden relative">

    {{-- GLOW --}}
    <div class="absolute top-20 left-20 w-96 h-96 bg-blue-600/20 blur-[120px] rounded-full"></div>

    <div class="absolute bottom-20 right-20 w-96 h-96 bg-purple-600/20 blur-[120px] rounded-full"></div>


    <div class="relative max-w-7xl mx-auto px-6">

        {{-- HEADER --}}
        <div class="flex items-center justify-between mb-10">

            <div>

                <h1 class="text-6xl font-black mb-3">

                    Explore Events

                </h1>

                <p class="text-gray-400 text-xl">

                    Temukan event terbaik untuk pengalaman terbaik.

                </p>

            </div>

            {{-- ADMIN BUTTON --}}
            @if(auth()->user()->role == 'admin')

                <a
                    href="{{ route('events.create') }}"
                    class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:scale-105 transition duration-300 px-8 py-4 rounded-2xl text-lg font-bold shadow-2xl">

                    + Tambah Event

                </a>

            @endif

        </div>


        {{-- SEARCH --}}
        <div class="mb-16">

            <form method="GET">

                <div class="relative group">

                    {{-- ICON --}}
                    <div class="absolute left-6 top-1/2 -translate-y-1/2 text-gray-400 text-xl">

                        🔍

                    </div>

                    {{-- INPUT --}}
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari event konser, seminar, festival..."
                        class="w-full bg-white/5 backdrop-blur-2xl border border-white/10 rounded-[30px] pl-16 pr-44 py-6 text-white text-lg placeholder-gray-500 focus:border-blue-500 focus:ring-0 transition duration-300">

                    {{-- BUTTON --}}
                    <button
                        class="absolute right-3 top-1/2 -translate-y-1/2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:scale-105 transition duration-300 px-8 py-3 rounded-2xl font-bold shadow-xl">

                        Cari

                    </button>

                </div>

            </form>

        </div>


        {{-- EMPTY STATE --}}
        @if($events->count() == 0)

            <div class="bg-white/5 border border-white/10 rounded-[40px] p-20 text-center backdrop-blur-xl">

                <h1 class="text-5xl font-black mb-5">

                    Event Tidak Ditemukan

                </h1>

                <p class="text-gray-400 text-xl mb-10">

                    Tidak ada event yang cocok dengan pencarianmu.

                </p>

                <a
                    href="{{ route('events.index') }}"
                    class="bg-blue-600 hover:bg-blue-700 transition duration-300 px-8 py-4 rounded-2xl text-lg font-bold">

                    Lihat Semua Event

                </a>

            </div>

        @endif


        {{-- EVENT GRID --}}
        <div class="grid md:grid-cols-3 gap-10">

            @foreach($events as $event)

                <div class="group relative fade-in">

                    {{-- GLOW --}}
                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-purple-600 rounded-[35px] blur opacity-20 group-hover:opacity-60 transition duration-500"></div>

                    {{-- CARD --}}
                    <div class="relative bg-zinc-900 border border-white/10 rounded-[35px] overflow-hidden hover:-translate-y-3 transition duration-500">

                        {{-- IMAGE --}}
                        <div class="overflow-hidden">

                            <img
                                src="https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?q=80&w=1200"
                                class="w-full h-72 object-cover group-hover:scale-110 transition duration-700">

                        </div>

                        {{-- CONTENT --}}
                        <div class="p-7">

                            {{-- BADGE --}}
                            <div class="mb-5">

                                <span class="bg-blue-600/20 text-blue-300 px-4 py-2 rounded-full text-sm border border-blue-500/20">

                                    LIVE EVENT

                                </span>

                            </div>

                            {{-- TITLE --}}
                            <h2 class="text-3xl font-black mb-3">

                                {{ $event->title }}

                            </h2>

                            {{-- LOCATION --}}
                            <p class="text-gray-400 mb-3">

                                📍 {{ $event->location }}

                            </p>

                            {{-- DATE --}}
                            <p class="text-gray-400 mb-6">

                                📅 {{ $event->event_date }}

                            </p>

                            {{-- PRICE --}}
                            <div class="mb-8">

                                <span class="text-4xl font-black text-green-400">

                                    Rp {{ number_format($event->price) }}

                                </span>

                            </div>


                            {{-- USER BUTTON --}}
                            @if(auth()->user()->role == 'user')

                                <div class="grid grid-cols-2 gap-3">

                                    {{-- DETAIL --}}
                                    <a
                                        href="{{ route('events.show', $event->id) }}"
                                        class="bg-white/10 hover:bg-white/20 transition duration-300 text-center py-4 rounded-2xl font-semibold">

                                        Detail

                                    </a>

                                    {{-- BUY --}}
                                    <form
                                        action="{{ route('orders.store') }}"
                                        method="POST">

                                        @csrf

                                        <input
                                            type="hidden"
                                            name="event_id"
                                            value="{{ $event->id }}">

                                        <button
                                            class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:scale-105 transition duration-300 py-4 rounded-2xl font-bold shadow-2xl">

                                            🎟️ Beli

                                        </button>

                                    </form>

                                </div>

                            @endif


                            {{-- ADMIN BUTTON --}}
                            @if(auth()->user()->role == 'admin')

                                <div class="grid grid-cols-3 gap-3">

                                    {{-- DETAIL --}}
                                    <a
                                        href="{{ route('events.show', $event->id) }}"
                                        class="bg-white/10 hover:bg-white/20 transition duration-300 text-center py-3 rounded-2xl">

                                        Detail

                                    </a>

                                    {{-- EDIT --}}
                                    <a
                                        href="{{ route('events.edit', $event->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 transition duration-300 text-center py-3 rounded-2xl font-semibold">

                                        Edit

                                    </a>

                                    {{-- DELETE --}}
                                    <form
                                        action="{{ route('events.destroy', $event->id) }}"
                                        method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="w-full bg-red-600 hover:bg-red-700 transition duration-300 py-3 rounded-2xl font-semibold">

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            @endif

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>

</x-app-layout>