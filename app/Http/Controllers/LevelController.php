<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $levels = Level::sortable()->paginate(10);
        return view('levels.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('levels.create');
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
            'level' => 'required',
        ]);
        // Create new record with the form data
        Level::create($request->all());

        return redirect('levels')->with('success', 'Information has been added');
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
        $level = Level::findOrFail($id);
        return view('levels.show', compact('level'));
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
       $level = Level::findOrFail($id);
       return view('levels.edit', compact('level'));
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
        $level = Level::findOrFail($id);

        // Get upates from edit page and fill
        $input = $request->all();
        $level->update($input);
        
        return redirect('levels')->with('success', 'Information has been added');
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
        $level = Level::findOrFail($id);
        $level->delete();
        
        return redirect('levels')->with('success', 'Information has been deleted');
    }
}
