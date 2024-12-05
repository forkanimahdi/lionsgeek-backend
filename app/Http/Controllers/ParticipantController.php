<?php

namespace App\Http\Controllers;

use App\Exports\ParticipantsExport;
use App\Models\FrequentQuestion;
use App\Models\InfoSession;
use App\Models\Note;
use App\Models\Participant;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participants = Participant::all();
        $infos = InfoSession::all();
        return view("participants.participants", compact("participants", "infos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Participant $participant)
    {
        $notes = Note::where("participant_id", $participant->id)->get();
        $questions = $participant->questions;
        $satisfactions = array_slice($participant->satisfaction->getAttributes(), 2, -2);

        return view("participants.partials.participant_show", compact("participant", "notes", "questions", "satisfactions"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Participant $participant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participant $participant)
    {
        //
    }

    public function frequestQuestions(Request $request, Participant $participant)
    {


        $frequents = $participant->questions;
        foreach ($request->all() as $field => $value) {
            if ($field != "_token") {
                $frequents->update([
                    $field => $value ?? $frequents->$field,
                ]);
            }
        }

        return redirect()->back()->with("success", "Form submitted successfully!");
    }



    public function updateSatisfaction(Request $request, $participantId)
    {
        $participant = Participant::findOrFail($participantId);

        $satisfactionData = $request->input("satisfaction");

        foreach ($satisfactionData as $column => $checked) {
            $participant->satisfaction->{$column} = $checked == "on" ? 1 : 0;
        }

        $participant->satisfaction->save();

        return redirect()->back()->with("success", "Satisfaction data saved successfully!");
    }


    public function export()
    {
        // TODO: add date to the title, here and coworking
        return Excel::download(new ParticipantsExport, "participant.xlsx");
    }



    public function step(Request $request, Participant $participant)
    {
        // the action value of the submit buttons in the form
        $action = $request->input("action");
        
        if($participant->current_step == "interview") {
            $participant->update([
                "current_step" => $action == "next" ? "coding_week" : "interview_failed",
            ]);
        } elseif ($participant->current_step == "coding_week") {
            $participant->update([
                "current_step" => $action == "next" ? "coding_school": "coding_week_failed",
            ]);
        }

        return back();
    }
}
