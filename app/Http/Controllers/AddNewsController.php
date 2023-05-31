<?php

namespace App\Http\Controllers;

use App\Models\AddNews;
use Illuminate\Http\Request;

class AddNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $add_news = AddNews::all();
        return view('admin.add_news', ['add_news' => $add_news]);
    }

    public function index_news()
    {
        $add_news = AddNews::all()->sortByDesc('id');
        foreach ($add_news as $news) {
            $limitedText = implode(' ', array_slice(str_word_count($news->text, 1), 0, 30));
            $news->limitedText = $limitedText;
        }
        return view('admin.index', ['add_news' => $add_news]);
    }

    public function show_news(Request $request)
    {
        $add_news = AddNews::find($request->id);
        return view('admin.show_news', ['add_news' => $add_news]);
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
            'title' => 'required',
            'text' => 'required',
        ]);

        // Process the uploaded file
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
        }else{
            $imageName = null;
        }

        $add_news = new AddNews();
        $add_news->title = $request->title;
        $add_news->text = $request->text;
        $add_news->image = $imageName;
        $add_news->save();

        return redirect()->back()->with('success', 'Successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(AddNews $addNews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AddNews $addNews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AddNews $addNews)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
        ]);

        $add_news = AddNews::find($request->id);
        $add_news->title = $request->title;
        $add_news->text = $request->text;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);

            // Eski rasm faylini o'chirib tashlash
            if (!empty($add_news->image)) {
                $imagePath = public_path('images') . '/' . $add_news->image;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $add_news->image = $imageName;
        }

        $add_news->save();

        return redirect()->back()->with('success', 'Successful updated!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        AddNews::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successful deleted');
    }
}
