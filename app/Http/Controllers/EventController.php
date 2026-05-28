<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();

        if ($request->search) {

            $query->where(
                'title',
                'like',
                '%' . $request->search . '%'
            );
        }

        $events = $query
            ->latest()
            ->get();

        return view(
            'events.index',
            compact('events')
        );
    }

    public function show(Event $event)
    {
        return view(
            'events.show',
            compact('event')
        );
    }

    public function edit(Event $event)
    {
        return view(
            'events.edit',
            compact('event')
        );
    }

    public function update(
        Request $request,
        Event $event
    ) {
        $event->update([

            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'event_date' => $request->event_date,
            'price' => $request->price,
            'quota' => $request->quota,

        ]);

        return redirect()
            ->route('events.index')
            ->with(
                'success',
                'Event berhasil diupdate'
            );
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'event_date' => $request->event_date,
            'price' => $request->price,
            'quota' => $request->quota,
            'created_by' => auth()->id()
        ]);

        return redirect()->route('events.index')
            ->with('success', 'Event berhasil dibuat');
    }
}