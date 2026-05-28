<x-app-layout>

<div class="min-h-screen bg-black text-white overflow-hidden">

    {{-- HERO --}}
    <section class="relative h-[90vh] flex items-center">

        {{-- BACKGROUND --}}
        <img
            src="https://images.unsplash.com/photo-1501386761578-eac5c94b800a?q=80&w=1600"
            class="absolute inset-0 w-full h-full object-cover">

        {{-- OVERLAY --}}
        <div class="absolute inset-0 bg-black/70"></div>

        {{-- GRADIENT --}}
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent"></div>

        {{-- CONTENT --}}
        <div class="relative max-w-7xl mx-auto px-6 w-full">

            @if(auth()->user()->role == 'user')

                <div class="max-w-3xl">

                    <div class="mb-6">

                        <span class="bg-white/10 backdrop-blur-xl border border-white/20 px-5 py-2 rounded-full text-sm">

                            🔥 EVENT PALING POPULER 2026

                        </span>

                    </div>

                    <h1 class="text-7xl font-black leading-tight mb-6">

                        Discover
                        Amazing
                        Events.

                    </h1>

                    <p class="text-xl text-gray-300 leading-9 mb-10">

                        Rasakan pengalaman event modern dengan konser,
                        seminar, festival, dan acara terbaik di Indonesia.

                    </p>

                    <div class="flex gap-5">

                        <a href="#events"
                           class="bg-blue-600 hover:bg-blue-700 px-8 py-4 rounded-2xl text-lg font-bold transition duration-300">

                            🎟️ Explore Event

                        </a>

                        <a href="{{ route('orders.index') }}"
                           class="bg-white/10 backdrop-blur-xl border border-white/20 px-8 py-4 rounded-2xl text-lg font-bold hover:bg-white/20 transition duration-300">

                            Tiket Saya

                        </a>

                    </div>

                </div>

            @endif


            @if(auth()->user()->role == 'admin')

                <div class="max-w-3xl">

                    <div class="mb-6">

                        <span class="bg-red-500/20 text-red-300 border border-red-400/30 px-5 py-2 rounded-full text-sm">

                            ADMIN PANEL

                        </span>

                    </div>

                    <h1 class="text-7xl font-black leading-tight mb-6">

                        Manage
                        Your
                        Events.

                    </h1>

                    <p class="text-xl text-gray-300 leading-9 mb-10">

                        Kelola event, peserta, pembayaran, dan laporan
                        dengan sistem Event Organizer modern.

                    </p>

                </div>

            @endif

        </div>

    </section>


    {{-- EVENT LIST --}}
    @if(auth()->user()->role == 'user')

        <section
            id="events"
            class="max-w-7xl mx-auto px-6 py-20">

            <div class="flex items-center justify-between mb-14">

                <div>

                    <h1 class="text-5xl font-black mb-3">

                        Trending Events

                    </h1>

                    <p class="text-gray-400 text-lg">

                        Event pilihan terbaik minggu ini.

                    </p>

                </div>

            </div>

            <div class="grid md:grid-cols-3 gap-10">

                @foreach(\App\Models\Event::latest()->get() as $event)

                    <div class="group relative">

                        {{-- GLOW --}}
                        <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-purple-600 rounded-[35px] blur opacity-25 group-hover:opacity-60 transition duration-500"></div>

                        {{-- CARD --}}
                        <div class="relative bg-zinc-900 rounded-[35px] overflow-hidden border border-white/10 hover:-translate-y-3 transition duration-500">

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

                                    <span class="bg-blue-600/20 text-blue-300 px-4 py-2 rounded-full text-sm">

                                        LIVE EVENT

                                    </span>

                                </div>

                                {{-- TITLE --}}
                                <h2 class="text-3xl font-black mb-3">

                                    {{ $event->title }}

                                </h2>

                                {{-- LOCATION --}}
                                <p class="text-gray-400 mb-5">

                                    📍 {{ $event->location }}

                                </p>

                                {{-- PRICE --}}
                                <div class="mb-7">

                                    <span class="text-4xl font-black text-green-400">

                                        Rp {{ number_format($event->price) }}

                                    </span>

                                </div>

                                {{-- BUTTON --}}
                                <form
                                    action="{{ route('orders.store') }}"
                                    method="POST">

                                    @csrf

                                    <input
                                        type="hidden"
                                        name="event_id"
                                        value="{{ $event->id }}">

                                    <button
                                        class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:scale-105 transition duration-300 py-4 rounded-2xl text-lg font-bold shadow-2xl">

                                        🎟️ Beli Tiket

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </section>

    @endif


    {{-- ADMIN CARD --}}
    @if(auth()->user()->role == 'admin')

        <section class="max-w-7xl mx-auto px-6 py-20">

            <div class="grid md:grid-cols-4 gap-8">

                <div class="bg-white/5 border border-white/10 rounded-[35px] p-8 backdrop-blur-xl hover:scale-105 transition duration-300">

                    <p class="text-gray-400 mb-4">
                        Total Event
                    </p>

                    <h1 class="text-6xl font-black text-blue-400">

                        {{ $totalEvents }}

                    </h1>

                </div>

                <div class="bg-white/5 border border-white/10 rounded-[35px] p-8 backdrop-blur-xl hover:scale-105 transition duration-300">

                    <p class="text-gray-400 mb-4">
                        Tiket Terjual
                    </p>

                    <h1 class="text-6xl font-black text-green-400">

                        {{ $totalOrders }}

                    </h1>

                </div>

                <div class="bg-white/5 border border-white/10 rounded-[35px] p-8 backdrop-blur-xl hover:scale-105 transition duration-300">

                    <p class="text-gray-400 mb-4">
                        Peserta
                    </p>

                    <h1 class="text-6xl font-black text-purple-400">

                        {{ $totalParticipants }}

                    </h1>

                </div>

                <div class="bg-white/5 border border-white/10 rounded-[35px] p-8 backdrop-blur-xl hover:scale-105 transition duration-300">

                    <p class="text-gray-400 mb-4">
                        Revenue
                    </p>

                    <h1 class="text-4xl font-black text-red-400">

                        Rp {{ number_format($revenue) }}

                    </h1>

                </div>

            </div>

        </section>

    @endif

</div>

</x-app-layout>