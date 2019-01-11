<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TopicTheme;

class TopicThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tthemes = TopicTheme::all();
        return view('topic_themes.index', compact('tthemes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topic_themes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // Validate that the data has the correct format
        $request->validate([
            'name' => 'required|max:25',
            'description' => 'required',
        ]);
        // Create new record with the form data
        TopicTheme::create($request->all());

        return redirect('topic_themes')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get record
        $ttheme = TopicTheme::findOrFail($id);
        return view('topic_themes.show', compact('ttheme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // Get record, pass to edit view
       $ttheme = TopicTheme::findOrFail($id);
       return view('topic_themes.edit', compact('ttheme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // Get existing record
        $ttheme = TopicTheme::findOrFail($id);

        // Get upates from edit page and fill
        $input = $request->all();
        $ttheme->update($input);
        
        return redirect('topic_themes')->with('success', 'Information has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ttheme = TopicTheme::findOrFail($id);
        $ttheme->delete();
        
        return redirect('topic_themes')->with('success', 'Information has been deleted');
    }
}
