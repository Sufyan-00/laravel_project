<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    public function index()
    {
        // $events = Event::all();
        $events = Event::with('registrations')->get();
        return view('admin.index', compact('events'));
    }

    public function viewUsers()
    {
        $users = User::all();
        // $verified=User::  // Fetch all users from the database
        return view('admin.view-users', compact('users'));
    }

    public function deleteUser(User $user)
    {
        // Ensure that admin cannot delete themselves
        if (Auth::user()->is_admin) {
            return redirect()->route('admin.viewUsers')->with('error', 'You cannot delete your own account.');
        }

        $user->delete();  // Delete the user

        return redirect()->route('admin.viewUsers')->with('success', 'User account deleted successfully.');
    }
    public function create()
    {
        return view('admin.create');
    }
    public function show($eventId)
{
    // Retrieve the event by its ID
    $event = Event::findOrFail($eventId);

    return view('admin.show', compact('event'));
}
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date|after_or_equal:today',
            'time' => 'required',
            'venue' => 'required|string|max:255',
        ], [
            'event_date.after_or_equal' => 'The event date cannot be in the past. Please select a valid date.',
        ]);
        if (Event::where('name', $request->name)->exists()) {
            return back()->with('warning', 'An event with the same name already exists. Please choose a different name.');
        }    
        // Create a new event with validated data
        Event::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'event_date' => $validated['event_date'],
            'time' => $validated['time'],
            'venue' => $validated['venue'],
        ]);

        // Redirect to the event list or the event detail page
        return redirect()->route('admin.index')->with('success', 'Event created successfully!');
    }

    public function edit($id)
    {
        $event = Event::find($id);
        return view('admin.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'event_date' => 'required|date',
        ]);

        $event = Event::find($id);
        $event->update($request->all());
        return redirect('/admin/events')->with('success', 'Event updated successfully');
    }

    public function destroy($id)
    {
        Event::find($id)->delete();
        return redirect('/admin/events')->with('success', 'Event deleted successfully');
    }
}
