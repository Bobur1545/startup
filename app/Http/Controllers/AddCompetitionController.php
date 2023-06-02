<?php

namespace App\Http\Controllers;

use App\Models\AddCompetition;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AddCompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $add_competitions = AddCompetition::orderBy('id', 'desc')->paginate(20);
        return view('admin.add_competition', ['add_competitions' => $add_competitions]);
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
            'name' => 'required',
            'last_document_day' => 'required',
            'competition_day' => 'required',
        ]);

        $add_competition = new AddCompetition();
        $add_competition->name = $request->name;
        $add_competition->last_document_day = $request->last_document_day;
        $add_competition->competition_day = $request->competition_day;

        $add_competition->save();

        return redirect()->back()->with('success', 'Successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(AddCompetition $addCompetition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AddCompetition $addCompetition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AddCompetition $add_competition):RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'last_document_day' => 'required',
            'competition_day' => 'required',
        ]);

        $add_competition = AddCompetition::find($request->id);
        $add_competition->name = $request->name;
        $add_competition->last_document_day = $request->last_document_day;
        $add_competition->competition_day = $request->competition_day;

        $add_competition->save();

        return redirect()->back()->with('success', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        AddCompetition::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successful deleted');
    }
}
