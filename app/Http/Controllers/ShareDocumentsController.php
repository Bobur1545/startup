<?php

namespace App\Http\Controllers;

use App\Models\AddCompetition;
use App\Models\MyDocuments;
use App\Models\ShareDocuments;
use Illuminate\Http\Request;

class ShareDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sharedocuments = ShareDocuments::where('user_id', auth()->user()->id)
            ->orderByDesc('id')
            ->paginate(20);

        $mydocuments = MyDocuments::where('user_id', auth()->user()->id)->get();
        $competitions = AddCompetition::all();
        return view('admin.share_documents',
            ['sharedocuments' => $sharedocuments, 'mydocuments' => $mydocuments, 'competitions' => $competitions]);
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
            'mydocuments_id' => 'required',
            'competition_id' => 'required',
        ]);

        $sharedocuments = new ShareDocuments();
        $sharedocuments->mydocuments_id = $request->mydocuments_id;
        $sharedocuments->competition_id = $request->competition_id;
        $sharedocuments['user_id'] = auth()->user()->id;
        $sharedocuments->save();

        return redirect()->back()->with('success', 'Successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(ShareDocuments $shareDocuments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShareDocuments $shareDocuments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShareDocuments $shareDocuments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        ShareDocuments::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successful deleted');
    }
}
