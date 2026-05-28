<x-app-layout>

<div class="min-h-screen bg-black text-white pt-36 pb-20">

    <div class="max-w-7xl mx-auto px-6">

        {{-- HEADER --}}
        <div class="mb-14">

            <h1 class="text-6xl font-black mb-4">

                Verifikasi Pembayaran

            </h1>

            <p class="text-gray-400 text-xl">

                Approve atau reject pembayaran user.

            </p>

        </div>


        {{-- TABLE --}}
        <div class="bg-white/5 backdrop-blur-2xl border border-white/10 rounded-[35px] overflow-hidden">

            <table class="w-full">

                <thead class="bg-white/5">

                    <tr class="text-left text-gray-300">

                        <th class="p-6">
                            Order
                        </th>

                        <th class="p-6">
                            User
                        </th>

                        <th class="p-6">
                            Event
                        </th>

                        <th class="p-6">
                            Status
                        </th>

                        <th class="p-6 text-center">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($payments as $payment)

                        <tr class="border-t border-white/10 hover:bg-white/5 transition duration-300">

                            {{-- ORDER --}}
                            <td class="p-6 font-semibold">

                                {{ $payment->order->order_number }}

                            </td>

                            {{-- USER --}}
                            <td class="p-6">

                                {{ $payment->order->user->name }}

                            </td>

                            {{-- EVENT --}}
                            <td class="p-6">

                                {{ $payment->order->event->title }}

                            </td>

                            {{-- STATUS --}}
                            <td class="p-6">

                                @if($payment->status == 'pending')

                                    <span class="bg-yellow-500/20 text-yellow-300 px-4 py-2 rounded-full text-sm">

                                        Pending

                                    </span>

                                @elseif($payment->status == 'approved')

                                    <span class="bg-green-500/20 text-green-300 px-4 py-2 rounded-full text-sm">

                                        Approved

                                    </span>

                                @endif

                            </td>

                            {{-- ACTION --}}
                            <td class="p-6">

                                <div class="flex justify-center gap-3">

                                    {{-- APPROVE --}}
                                    <form
                                        action="{{ route('payments.approve', $payment->id) }}"
                                        method="POST">

                                        @csrf

                                        <button
                                            class="bg-green-600 hover:bg-green-700 transition duration-300 px-5 py-3 rounded-2xl font-semibold">

                                            Approve

                                        </button>

                                    </form>

                                    {{-- REJECT --}}
                                    <form
                                        action="{{ route('payments.reject', $payment->id) }}"
                                        method="POST">

                                        @csrf

                                        <button
                                            class="bg-red-600 hover:bg-red-700 transition duration-300 px-5 py-3 rounded-2xl font-semibold">

                                            Reject

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

</x-app-layout>