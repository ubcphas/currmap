<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\TopicTheme;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $topics = Topic::all();
        return view('topics.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get the key/name for the themes and pass to view
        $themes = TopicTheme::pluck('name', 'id');
        return view('topics.create', compact('themes'));
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
        'name' => 'required|max:40',
        'description' => 'required',
        ]);
        // Create new record with the form data
        Topic::create($request->all());

        return redirect('topics')->with('success', 'Information has been added');
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
        $topic = Topic::findOrFail($id);
        return view('topics.show', compact('topic'));
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
       $topic = Topic::findOrFail($id);
       // Get the key/name for the themes and pass to view
       $themes = TopicTheme::pluck('name', 'id');
       return view('topics.edit', compact('topic', 'themes'));
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
        $topic = Topic::findOrFail($id);

        // Get upates from edit page and fill
        $input = $request->all();
        $topic->update($input);
        
        return redirect('topics')->with('success', 'Information has been added');
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
        $topic = Topic::findOrFail($id);
        $topic->delete();
        
        return redirect('topics')->with('success', 'Information has been deleted');
    }
}
