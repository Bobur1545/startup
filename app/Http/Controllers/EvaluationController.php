<?php

namespace App\Http\Controllers;

use App\Models\AddCompetition;
use App\Models\Evaluation;
use App\Models\MyDocuments;
use App\Models\ShareDocuments;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $competitions = AddCompetition::all();
        $selectedCompetitionId = $request->input('competition_id');

        // Tanlangan tanlov bilan bog'liq hujjatlarni olish
        $sharedocuments = ShareDocuments::where('competition_id', $selectedCompetitionId)->get();

        // Tanlangan ID ni sessionga saqlash
        session(['selectedCompetitionId' => $selectedCompetitionId]);

        return view('admin.evaluation', [
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
        $request->validate([
            'category_1' => 'required',
            'category_2' => 'required',
            'category_3' => 'required',
            'category_4' => 'required',
            'user_id' => 'required',
            'competition_id' => 'required'
        ]);

        $evaluation = new Evaluation();
        $evaluation->category_1 = $request->category_1;
        $evaluation->category_2 = $request->category_2;
        $evaluation->category_3 = $request->category_3;
        $evaluation->category_4 = $request->category_4;
        $evaluation->user_id = $request->user_id;
        $evaluation->competition_id = $request->competition_id;
        $evaluation->calculateCategoryAll();
        $evaluation->save();

        return redirect()->back()->with('success', 'Successfully added');
    }



    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        //
    }
}
