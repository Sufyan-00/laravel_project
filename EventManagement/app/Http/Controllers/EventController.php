<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Propaganistas\LaravelPhone\Rules\Phone;

class EventController extends Controller
{
    // Verify user email
    public function verifyEmail(Request $request)
    {
        $user = User::find($request->id);

        if (!$user || !$request->hasValidSignature()) {
            abort(403, 'Invalid verification link.');
        }

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        return redirect('/')->with('success', 'Your email has been verified. You may now complete your registration.');
    }

    public function show(Event $event)
    {
        // Check if the event date is in the past
        $eventHasEnded = Carbon::parse($event->event_date)->isPast();

        // Pass $event and $eventHasEnded to the view
        return view('user.event-registration', compact('event', 'eventHasEnded'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact' => 'required|phone:PK',
            'event_id' => 'required|exists:events,id',
        ],[
            'contact.phone' => 'The phone number is invalid. Please enter a valid phone number for Pakistan.',
        ]);

        $event = Event::findOrFail($request->event_id);

        // Check if event has ended
        if (Carbon::parse($event->event_date)->isPast()) {
            return back()->with('error', 'Event has ended. Registration is closed.');
        }

        // Check if email exists and is verified
        $user = User::firstOrCreate(
            ['email' => $request->email],
            ['name' => $request->name]
        );

        if (!$user->hasVerifiedEmail()) {
            $user->sendEmailVerificationNotification();
            return back()->with('info', 'Verification email sent. Please check your email.');
        }

        // Check for existing registration
        $existingRegistration = Registration::where([
            'email' => $request->email,
            'event_id' => $request->event_id,
        ])->exists();

        if ($existingRegistration) {
            return redirect("/events")->with('warning', 'You are already registered for this event.');
        }

        // Register the user for the event
        Registration::create([
            'event_id' => $request->event_id,
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
        ]);

        return back()->with('success', 'Registration successful!');
    }

}
