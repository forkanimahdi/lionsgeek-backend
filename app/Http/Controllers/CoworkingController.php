<?php

namespace App\Http\Controllers;

use App\Exports\CoworkingsExport;
use App\Models\Coworking;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CoworkingController extends Controller
{
    public function index()
    {
        $coworkings = Coworking::latest()->get();
        return view('coworkings.coworkings', compact('coworkings'));
    }

    public function show(Coworking $coworking)
    {
        return view('coworkings.partials.coworkings_show', compact('coworking'));
    }


    public function export()
    {
        return Excel::download(new CoworkingsExport, 'coworking.xlsx');
    }
}
