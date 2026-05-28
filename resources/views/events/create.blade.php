<x-app-layout>

<div class="min-h-screen bg-black text-white pt-36 pb-20 overflow-hidden relative">

    {{-- GLOW --}}
    <div class="absolute top-20 left-20 w-96 h-96 bg-blue-600/20 blur-[120px] rounded-full"></div>

    <div class="absolute bottom-20 right-20 w-96 h-96 bg-purple-600/20 blur-[120px] rounded-full"></div>


    <div class="relative max-w-4xl mx-auto px-6">

        {{-- HEADER --}}
        <div class="mb-14 text-center">

            <h1 class="text-7xl font-black mb-5">

                Create Event

            </h1>

            <p class="text-gray-400 text-2xl">

                Buat event baru dengan tampilan modern.

            </p>

        </div>


        {{-- FORM CARD --}}
        <div class="bg-white/5 backdrop-blur-2xl border border-white/10 rounded-[40px] p-10 shadow-2xl">

            <form
                action="{{ route('events.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                {{-- TITLE --}}
                <div class="mb-8">

                    <label class="block text-gray-300 mb-3 text-lg">

                        Nama Event

                    </label>

                    <input
                        type="text"
                        name="title"
                        required
                        class="w-full bg-white/10 border border-white/10 rounded-2xl px-6 py-5 text-white text-lg focus:border-blue-500 focus:ring-0">

                </div>


                {{-- DESCRIPTION --}}
                <div class="mb-8">

                    <label class="block text-gray-300 mb-3 text-lg">

                        Deskripsi Event

                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        required
                        class="w-full bg-white/10 border border-white/10 rounded-2xl px-6 py-5 text-white text-lg focus:border-blue-500 focus:ring-0"></textarea>

                </div>


                {{-- GRID --}}
                <div class="grid md:grid-cols-2 gap-8">

                    {{-- LOCATION --}}
                    <div>

                        <label class="block text-gray-300 mb-3 text-lg">

                            Lokasi

                        </label>

                        <input
                            type="text"
                            name="location"
                            required
                            class="w-full bg-white/10 border border-white/10 rounded-2xl px-6 py-5 text-white text-lg focus:border-blue-500 focus:ring-0">

                    </div>


                    {{-- DATE --}}
                    <div>

                        <label class="block text-gray-300 mb-3 text-lg">

                            Tanggal Event

                        </label>

                        <input
                            type="date"
                            name="event_date"
                            required
                            class="w-full bg-white/10 border border-white/10 rounded-2xl px-6 py-5 text-white text-lg focus:border-blue-500 focus:ring-0">

                    </div>

                </div>


                {{-- GRID --}}
                <div class="grid md:grid-cols-2 gap-8 mt-8">

                    {{-- PRICE --}}
                    <div>

                        <label class="block text-gray-300 mb-3 text-lg">

                            Harga Tiket

                        </label>

                        <input
                            type="number"
                            name="price"
                            required
                            class="w-full bg-white/10 border border-white/10 rounded-2xl px-6 py-5 text-white text-lg focus:border-blue-500 focus:ring-0">

                    </div>


                    {{-- QUOTA --}}
                    <div>

                        <label class="block text-gray-300 mb-3 text-lg">

                            Kuota Peserta

                        </label>

                        <input
                            type="number"
                            name="quota"
                            required
                            class="w-full bg-white/10 border border-white/10 rounded-2xl px-6 py-5 text-white text-lg focus:border-blue-500 focus:ring-0">

                    </div>

                </div>


                {{-- BANNER --}}
                <div class="mt-8">

                    <label class="block text-gray-300 mb-3 text-lg">

                        Banner Event

                    </label>

                    <input
                        type="file"
                        name="banner"
                        class="w-full bg-white/10 border border-white/10 rounded-2xl px-6 py-5 text-white">

                </div>


                {{-- BUTTON --}}
                <div class="mt-12 flex gap-5">

                    {{-- BACK --}}
                    <a
                        href="{{ route('events.index') }}"
                        class="flex-1 bg-white/10 hover:bg-white/20 transition duration-300 py-5 rounded-2xl text-center text-lg font-bold">

                        Kembali

                    </a>

                    {{-- SUBMIT --}}
                    <button
                        type="submit"
                        class="flex-1 bg-gradient-to-r from-blue-600 to-indigo-600 hover:scale-105 transition duration-300 py-5 rounded-2xl text-lg font-bold shadow-2xl">

                        🚀 Publish Event

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>