<x-app-layout>

<div class="min-h-screen bg-gray-100 py-10">

    <div class="max-w-4xl mx-auto px-6">

        <div class="bg-white rounded-3xl shadow p-8">

            <h1 class="text-4xl font-bold mb-8">

                Edit Event

            </h1>

            <form
                action="{{ route('events.update', $event->id) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="mb-5">

                    <label class="block mb-2 font-semibold">

                        Judul Event

                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ $event->title }}"
                        class="w-full border rounded-xl px-4 py-3">

                </div>

                <div class="mb-5">

                    <label class="block mb-2 font-semibold">

                        Lokasi

                    </label>

                    <input
                        type="text"
                        name="location"
                        value="{{ $event->location }}"
                        class="w-full border rounded-xl px-4 py-3">

                </div>

                <div class="mb-5">

                    <label class="block mb-2 font-semibold">

                        Tanggal Event

                    </label>

                    <input
                        type="date"
                        name="event_date"
                        value="{{ $event->event_date }}"
                        class="w-full border rounded-xl px-4 py-3">

                </div>

                <div class="mb-5">

                    <label class="block mb-2 font-semibold">

                        Harga Tiket

                    </label>

                    <input
                        type="number"
                        name="price"
                        value="{{ $event->price }}"
                        class="w-full border rounded-xl px-4 py-3">

                </div>

                <div class="mb-5">

                    <label class="block mb-2 font-semibold">

                        Kuota

                    </label>

                    <input
                        type="number"
                        name="quota"
                        value="{{ $event->quota }}"
                        class="w-full border rounded-xl px-4 py-3">

                </div>

                <div class="mb-8">

                    <label class="block mb-2 font-semibold">

                        Deskripsi

                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        class="w-full border rounded-xl px-4 py-3">{{ $event->description }}</textarea>

                </div>

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl">

                    Update Event

                </button>

            </form>

        </div>

    </div>

</div>

</x-app-layout>