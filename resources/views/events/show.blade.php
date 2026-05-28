<x-app-layout>

<div class="min-h-screen bg-black text-white overflow-hidden">

    {{-- HERO --}}
    <section class="relative h-[80vh]">

        {{-- IMAGE --}}
        <img
            src="https://images.unsplash.com/photo-1501386761578-eac5c94b800a?q=80&w=1600"
            class="absolute inset-0 w-full h-full object-cover">

        {{-- OVERLAY --}}
        <div class="absolute inset-0 bg-black/70"></div>

        {{-- CONTENT --}}
        <div class="relative h-full flex items-end">

            <div class="max-w-7xl mx-auto px-6 pb-20 w-full">

                <div class="max-w-3xl">

                    <div class="mb-5">

                        <span class="bg-blue-600/20 border border-blue-500/20 backdrop-blur-xl px-5 py-2 rounded-full text-blue-300">

                            LIVE EVENT

                        </span>

                    </div>

                    <h1 class="text-7xl font-black mb-6 leading-tight">

                        {{ $event->title }}

                    </h1>

                    <p class="text-2xl text-gray-300 leading-10">

                        {{ $event->description }}

                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- INFO --}}
    <section class="max-w-7xl mx-auto px-6 py-20">

        <div class="grid md:grid-cols-3 gap-10">

            {{-- INFO CARD --}}
            <div class="bg-white/5 border border-white/10 rounded-[35px] p-8 backdrop-blur-xl">

                <p class="text-gray-400 mb-3">

                    Lokasi

                </p>

                <h2 class="text-3xl font-black">

                    📍 {{ $event->location }}

                </h2>

            </div>

            {{-- DATE --}}
            <div class="bg-white/5 border border-white/10 rounded-[35px] p-8 backdrop-blur-xl">

                <p class="text-gray-400 mb-3">

                    Tanggal

                </p>

                <h2 class="text-3xl font-black">

                    📅 {{ $event->event_date }}

                </h2>

            </div>

            {{-- PRICE --}}
            <div class="bg-white/5 border border-white/10 rounded-[35px] p-8 backdrop-blur-xl">

                <p class="text-gray-400 mb-3">

                    Harga

                </p>

                <h2 class="text-4xl font-black text-green-400">

                    Rp {{ number_format($event->price) }}

                </h2>

            </div>

        </div>


        {{-- BUY --}}
        @if(auth()->user()->role == 'user')

        <div class="mt-16">

            <form
                action="{{ route('orders.store') }}"
                method="POST">

                @csrf

                <input
                    type="hidden"
                    name="event_id"
                    value="{{ $event->id }}">

                <button
                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:scale-[1.02] transition duration-300 py-6 rounded-[30px] text-2xl font-black shadow-2xl">

                    🎟️ Beli Tiket Sekarang

                </button>

            </form>

        </div>

        @endif

    </section>

</div>

</x-app-layout>