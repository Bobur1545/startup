<?php

namespace App\Http\Controllers;

use App\Models\AddCompetition;
use App\Models\MyDocuments;
use App\Models\ShareDocuments;
use Illuminate\Http\Request;

class ControlDocumentsController extends Controller
{
    public function index(Request $request)
    {
        $competitions = AddCompetition::all();
        $selectedCompetitionId = $request->input('competition_id');

        // Tanlangan tanlov bilan bog'liq hujjatlarni olish
        $sharedocuments = ShareDocuments::where('competition_id', $selectedCompetitionId)->get();
        $mydocuments = MyDocuments::all();

        return view('admin.controldocuments', [
            'competitions' => $competitions,
            'sharedocuments' => $sharedocuments,
            'mydocuments' => $mydocuments,
            'selectedCompetitionId' => $selectedCompetitionId
        ]);
    }
}
