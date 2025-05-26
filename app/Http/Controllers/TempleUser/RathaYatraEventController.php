<?php

namespace App\Http\Controllers\TempleUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RathaYatraEvent;
use Illuminate\Support\Facades\Storage;

class RathaYatraEventController extends Controller
{
    public function addEvent(){
        // Return the view for adding an event
        return view('templeuser.rathayatra.add-event');
    }

     public function saveEvent(Request $request)
    {
        // Validate request
        $request->validate([
            'language' => 'required|string',
            'event_name' => 'required|string|max:255',
            'date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        // Handle file uploads
        $photoUrls = [];
        if ($request->hasFile('photo')) {
            foreach ($request->file('photo') as $photo) {
                $path = $photo->store('public/event_photos');
                $photoUrls[] = asset(Storage::url($path)); // Generate full URL
            }
        }

        // Save event to database
        $event = RathaYatraEvent::create([
            'event_name' => $request->event_name,
            'date' => $request->date,
            'description' => $request->description,
            'language' => $request->language,
            'photo' => json_encode($photoUrls), // store as JSON
        ]);

        return redirect()->back()->with('success', 'Event saved successfully!');
    }

    public function manageEvent()
    {
        // Fetch all events from the database
        $events = RathaYatraEvent::all();

        // Return the view with events data
        return view('templeuser.rathayatra.manage-event', compact('events'));
    }

    public function updateEvent(Request $request)
{
    $request->validate([
        'id' => 'required|exists:ratha__yatra_event,id',
        'event_name' => 'required',
        'date' => 'required|date',
        'language' => 'required',
        'description' => 'nullable|string',
    ]);

    $event = RathaYatraEvent::find($request->id);
    $event->update($request->only(['event_name', 'date', 'language', 'description']));

    return redirect()->back()->with('success', 'Event updated successfully!');
}

public function deleteEvent($id)
{
    $event = RathaYatraEvent::findOrFail($id);
    $event->delete();

    return redirect()->back()->with('success', 'Event deleted successfully!');
}

}
