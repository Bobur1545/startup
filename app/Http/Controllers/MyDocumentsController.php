<?php

namespace App\Http\Controllers;

use App\Models\MyDocuments;
use Illuminate\Http\Request;

class MyDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $mydocuments = MyDocuments::where('user_id', auth()->user()->id)
            ->orderByDesc('id')
            ->paginate(20);

        return view('admin.mydocuments', ['mydocuments' => $mydocuments]);
    }

    public function user_index(Request $request)
    {
        $mydocuments = MyDocuments::find($request->id);
        return view('admin.mydocument_control', ['mydocuments' => $mydocuments]);
    }

    public function download($id)
    {
        $file = MyDocuments::findOrFail($id);
        $filePath =  public_path('presentation/'. $file->project_ppt);
        return response()->download($filePath, $file->original_name);
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
            'project_name' => 'required',
            'project_type' => 'required',
            'project_field' => 'required',
            'project_ppt' => 'required',
        ]);

        $mydocuments = new MyDocuments();
        $mydocuments->project_name = $request->project_name;
        $mydocuments->project_type = $request->project_type;
        $mydocuments->project_field = $request->project_field;
        $mydocuments->project_github = $request->project_github;

        //for ppt file
        if ($request->hasFile('project_ppt')) {
            $file = $request->file('project_ppt');
            $filename = time() . '.' . $file->getClientOriginalName();
            $file->move(public_path('presentation'), $filename);
        }
        $mydocuments->project_ppt = $filename;

        //for image
        if ($request->hasFile('project_images')) {
            $image = $request->file('project_images');
            $imageName = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
        }else{
            $imageName = null;
        }
        $mydocuments->project_images = $imageName;
        $mydocuments['user_id'] = auth()->user()->id;
        $mydocuments->save();

        return redirect()->back()->with('success', 'Successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(MyDocuments $myDocuments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MyDocuments $myDocuments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MyDocuments $myDocuments)
    {
        $request->validate([
            'project_name' => 'required',
            'project_type' => 'required',
            'project_field' => 'required',
        ]);

        $mydocuments = MyDocuments::find($request->id);
        $mydocuments->project_name = $request->project_name;
        $mydocuments->project_type = $request->project_type;
        $mydocuments->project_field = $request->project_field;
        $mydocuments->project_github = $request->project_github;

        //for ppt file
        if ($request->hasFile('project_ppt')) {
            $file = $request->file('project_ppt');
            $filename = time() . '.' . $file->getClientOriginalName();
            $file->move(public_path('presentation'), $filename);

            if (!empty($mydocuments->project_ppt)) {
                $filePath = public_path('presentation') . '/' . $mydocuments->project_ppt;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            $mydocuments->project_ppt = $filename;
        }

        //for image
        if ($request->hasFile('project_images')) {
            $image = $request->file('project_images');
            $imageName = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);

            if (!empty($mydocuments->project_images)) {
                $imagePath = public_path('images') . '/' . $mydocuments->project_images;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $mydocuments->project_images = $imageName;
        }
        $mydocuments['user_id'] = auth()->user()->id;
        $mydocuments->save();

        return redirect()->back()->with('success', 'Successfully added');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        MyDocuments::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successful deleted');
    }
}
