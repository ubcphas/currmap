<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OutcomeTheme;

class OutcomeThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $othemes = OutcomeTheme::all();
        return view('outcome_themes.index', compact('othemes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('outcome_themes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate that the data has the correct format
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required',
        ]);
        // Create new record with the form data
        OutcomeTheme::create($request->all());

        return redirect('outcome_themes')->with('success', 'Information has been added');
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
      $otheme = OutcomeTheme::findOrFail($id);
      return view('outcome_themes.show', compact('otheme'));
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
       $otheme = OutcomeTheme::findOrFail($id);
       return view('outcome_themes.edit', compact('otheme'));
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
        // Get existing record
        $otheme = OutcomeTheme::findOrFail($id);

        // Get upates from edit page and fill
        $input = $request->all();
        $otheme->update($input);

        return redirect('outcome_themes')->with('success', 'Information has been added');
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
        $otheme = OutcomeTheme::findOrFail($id);
        $otheme->delete();
        
        return redirect('outcome_themes')->with('success', 'Information has been deleted');
    }
}
