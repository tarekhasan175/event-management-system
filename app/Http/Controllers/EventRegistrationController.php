<?php

namespace App\Http\Controllers;

use App\Events\UserRegisteredForEvent;
use App\Models\AuditLog;
use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventRegistrationController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }


    public function register(Request $request, $eventId)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);

        return DB::transaction(function () use ($request, $eventId) {
            $event = Event::lockForUpdate()->findOrFail($eventId);

            if ($event->registrations()->where('user_id', $request->user_id)->exists()) {
                return back()->with('error', 'You are already registered for this event.');
            }

            if ($event->registrations()->count() >= $event->capacity) {
                return back()->with('error', 'This event is full.');
            }

            $registration = Registration::create([
                'user_id' => $request->user_id,
                'event_id' => $event->id,
            ]);

            AuditLog::create([
                'user_id' => $request->user_id,
                'event_id' => $event->id,
                'action' => 'registered'
            ]);

            event(new UserRegisteredForEvent($registration));

            return back()->with('success', 'Registration successful!');
        });
    }
}
