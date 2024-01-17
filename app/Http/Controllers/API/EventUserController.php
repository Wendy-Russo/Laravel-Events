<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;

class EventUserController extends Controller
{
    /**
     * Register a user for an event.
     */
    public function register(User $user, Event $event)
    {
        // Check if the user is not already registered for the event
        if (!$user->events()->find($event->id)) {
            // Attach the user to the event
            $user->events()->attach($event->id);

            return response()->json(['message' => 'User registered for the event']);
        }

        return response()->json(['message' => 'User is already registered for the event']);
    }

    /**
     * Unregister a user from an event.
     */
    public function unregister(User $user, Event $event)
    {
        // Detach the user from the event
        $user->events()->detach($event->id);

        return response()->json(['message' => 'User unregistered from the event']);
    }
}