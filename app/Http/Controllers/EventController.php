<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Gemini;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::latest()->get();
        return view("event.event_index", compact("events"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("event.event_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([

            "name" => "required|array|min:3",
            "name.en" => "string|required",
            "name.fr" => "string|required",
            "name.ar" => "string|required",

            "description" => "array|min:3",
            "description.en" => "string|nullable",
            "description.fr" => "string|nullable",
            "description.ar" => "string|nullable",

            "location" => "required|array|min:3",
            "location.en" => "string|nullable",
            "location.fr" => "string|nullable",
            "location.ar" => "string|nullable",

            "date" => "required|date|after:now",
            "price" => "required|min:0",
            "cover" => "required",

        ]);

        $fileName = $this->uploadFile($request->file('cover'), "/events/");


        Event::create([
            "name" => $request->input("name"),
            "location" => $request->input("location"),
            "description" => $request->input("description"),
            "date" => $request->date,
            "price" => $request->price,
            "cover" => $fileName
        ]);

        return redirect("/events")->with("success", "Event has been added successfully!");
    }

    public function translate(Request $request)
    {
        $gemini_api_key = env("GEMINI_API_KEY");
    
        $client = Gemini::client($gemini_api_key);
    
        $name = (object) $request->name;
        $description = (object) $request->description;
        $location = (object) $request->location;
    
        $prompt = "Translate the following text into English, French, and Arabic, and return the result in an object where each field (name, description, location) is grouped by language like this: {\"en\": {\"name\": \"[translated name in English]\", \"description\": \"[translated description in English]\", \"location\": \"[translated location in English]\"}, \"fr\": {\"name\": \"[translated name in French]\", \"description\": \"[translated description in French]\", \"location\": \"[translated location in French]\"}, \"ar\": {\"name\": \"[translated name in Arabic]\", \"description\": \"[translated description in Arabic]\", \"location\": \"[translated location in Arabic]\"}}. The text to translate is: \"$name->en, $description->en, $location->en\"";    
        try {
            $result = $client->geminiPro()->generateContent($prompt);
    
            $translatedText = $result->text();
    
            $translated = json_decode($translatedText, true);
    
            return response()->json([
                'data' => $translated
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Translation failed due to an unexpected error'], 500);
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view("event.event_show", compact("event"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        request()->validate([
            "name" => "required|array|min:3",
            "name.en" => "string|nullable",
            "name.fr" => "string|nullable",
            "name.ar" => "string|nullable",

            "description" => "required|array|min:3",
            "description.en" => "string|nullable",
            "description.fr" => "string|nullable",
            "description.ar" => "string|nullable",

            "location" => "required|array|min:3",
            "location.en" => "string|nullable",
            "location.fr" => "string|nullable",
            "location.ar" => "string|nullable",

            "date" => "required|date|after:now",
            "price" => "required|numeric|min:0",
            "cover" => "nullable",
        ]);

        // ? Update cover

        $hasFile = $request->cover;

        if ($hasFile) {
            Storage::disk('public')->delete("images/events/" . $event->cover);
            $fileName = $this->uploadFile($request->file('cover'), "/events/");

        }


        $event->update([
            "name" => $request->input("name"),
            "location" => $request->input("location"),
            "description" => $request->input("description"),
            "date" => $request->date,
            "price" => $request->price,
            "cover" => $hasFile ? $fileName : $event->cover
        ]);

        return redirect("events")->with("success", "Event has been updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {

        Storage::disk("public")->delete("images/events/" . $event->cover);

        $event->delete();

        return redirect("/events")->with("success", "Event has been deleted successfully!");
    }
}
