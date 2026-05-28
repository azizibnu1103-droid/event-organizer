<x-app-layout>

<div class="min-h-screen bg-black text-white pt-36 pb-20 overflow-hidden">

    {{-- BACKGROUND GLOW --}}
    <div class="fixed inset-0 overflow-hidden">

        <div class="absolute top-20 left-20 w-96 h-96 bg-blue-600/20 blur-[120px] rounded-full"></div>

        <div class="absolute bottom-20 right-20 w-96 h-96 bg-purple-600/20 blur-[120px] rounded-full"></div>

    </div>


    <div class="relative max-w-7xl mx-auto px-6">

        {{-- HEADER --}}
        <div class="mb-16">

            <h1 class="text-7xl font-black mb-5">

                Tiket Saya

            </h1>

            <p class="text-gray-400 text-2xl">

                Semua tiket event yang sudah kamu beli.

            </p>

        </div>


        {{-- EMPTY --}}
        @if($orders->count() == 0)

            <div class="bg-white/5 border border-white/10 rounded-[40px] p-20 text-center">

                <h2 class="text-5xl font-black mb-5">

                    Belum Ada Tiket

                </h2>

                <p class="text-gray-400 text-xl mb-10">

                    Kamu belum membeli event apapun.

                </p>

                <a
                    href="{{ route('dashboard') }}"
                    class="bg-blue-600 hover:bg-blue-700 transition duration-300 px-8 py-4 rounded-2xl text-lg font-bold">

                    Explore Event

                </a>

            </div>

        @endif


        {{-- TICKET GRID --}}
        <div class="grid md:grid-cols-2 gap-10">

            @foreach($orders as $order)

                <div class="group relative">

                    {{-- GLOW --}}
                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-purple-600 rounded-[40px] blur opacity-20 group-hover:opacity-50 transition duration-500"></div>

                    {{-- TICKET --}}
                    <div class="relative bg-zinc-900 border border-white/10 rounded-[40px] overflow-hidden">

                        {{-- TOP --}}
                        <div class="relative h-56 overflow-hidden">

                            <img
                                src="https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?q=80&w=1200"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-700">

                            {{-- OVERLAY --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent"></div>

                            {{-- STATUS --}}
                            <div class="absolute top-5 right-5">

                                @if($order->status == 'pending')

                                    <span class="bg-yellow-500/20 text-yellow-300 px-5 py-2 rounded-full backdrop-blur-xl border border-yellow-400/20">

                                        Pending

                                    </span>

                                @elseif($order->status == 'paid')

                                    <span class="bg-green-500/20 text-green-300 px-5 py-2 rounded-full backdrop-blur-xl border border-green-400/20">

                                        Paid

                                    </span>

                                @endif

                            </div>

                        </div>


                        {{-- CONTENT --}}
                        <div class="p-8">

                            {{-- TITLE --}}
                            <h2 class="text-4xl font-black mb-5">

                                {{ $order->event->title }}

                            </h2>

                            {{-- INFO --}}
                            <div class="space-y-4 mb-8">

                                <div class="flex items-center justify-between">

                                    <span class="text-gray-400">
                                        Order ID
                                    </span>

                                    <span class="font-semibold">
                                        {{ $order->order_number }}
                                    </span>

                                </div>

                                <div class="flex items-center justify-between">

                                    <span class="text-gray-400">
                                        Lokasi
                                    </span>

                                    <span class="font-semibold">
                                        {{ $order->event->location }}
                                    </span>

                                </div>

                                <div class="flex items-center justify-between">

                                    <span class="text-gray-400">
                                        Tanggal
                                    </span>

                                    <span class="font-semibold">
                                        {{ $order->event->event_date }}
                                    </span>

                                </div>

                                <div class="flex items-center justify-between">

                                    <span class="text-gray-400">
                                        Harga
                                    </span>

                                    <span class="text-green-400 font-black text-2xl">

                                        Rp {{ number_format($order->total_price) }}

                                    </span>

                                </div>

                            </div>


                            {{-- PAYMENT --}}
                            @if($order->status == 'pending')

                                <form
                                    action="{{ route('payments.upload') }}"
                                    method="POST"
                                    enctype="multipart/form-data">

                                    @csrf

                                    <input
                                        type="hidden"
                                        name="order_id"
                                        value="{{ $order->id }}">

                                    <div class="mb-5">

                                        <label class="block mb-3 text-gray-300">

                                            Upload Bukti Pembayaran

                                        </label>

                                        <input
                                            type="file"
                                            name="payment_proof"
                                            class="w-full bg-white/10 border border-white/10 rounded-2xl p-4">

                                    </div>

                                    <button
                                        class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:scale-105 transition duration-300 py-4 rounded-2xl text-lg font-bold">

                                        Upload Pembayaran

                                    </button>

                                </form>

                            @endif


                            {{-- SUCCESS --}}
                            @if($order->status == 'paid')

                                <div class="bg-green-500/10 border border-green-500/20 rounded-3xl p-6 text-center">

                                    <h3 class="text-3xl font-black text-green-400 mb-3">

                                        Tiket Aktif

                                    </h3>

                                    <p class="text-gray-300">

                                        Pembayaran berhasil diverifikasi.

                                    </p>

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