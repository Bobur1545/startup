<?php

namespace App\Http\Controllers;

use App\Models\AddCompetition;
use App\Models\Evaluation;
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

        // Tanlangan ID ni sessionga saqlash
        session(['selectedCompetitionId' => $selectedCompetitionId]);

        return view('admin.controldocuments', [
            'competitions' => $competitions,
            'sharedocuments' => $sharedocuments,
            'selectedCompetitionId' => $selectedCompetitionId
        ]);
    }

    public function show_user_documents(Request $request)
    {
        $mydocuments = MyDocuments::find($request->id);
        return view('admin.show_user_documents', [
            'mydocuments' => $mydocuments] );
    }

    public function index_grades(Request $request)
    {
        $competitions = AddCompetition::all();
        $selectedCompetitionId = $request->input('competition_id');

        // Tanlangan tanlov bilan bog'liq hujjatlarni olish
        $show_grades = Evaluation::where('competition_id', $selectedCompetitionId)
            ->orderBy('category_all', 'desc')
            ->get();


        // Tanlangan ID ni sessionga saqlash
        session(['selectedCompetitionId' => $selectedCompetitionId]);

        return view('admin.control_grades', [
            'competitions' => $competitions,
            'show_grades' => $show_grades,
            'selectedCompetitionId' => $selectedCompetitionId
        ]);
    }


}
