<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outcome;
use App\OutcomeTheme;

class OutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $outcomes = Outcome::all();
        return view('outcomes.index', compact('outcomes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // Get the key/name for the themes and pass to view
        $themes = OutcomeTheme::pluck('name', 'id');
        return view('outcomes.create', compact('themes'));
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
        'name' => 'required|max:25',
        'description' => 'required',
        ]);
        // Create new record with the form data
        Outcome::create($request->all());

        return redirect('outcomes')->with('success', 'Information has been added');
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
      $outcome = Outcome::findOrFail($id);
      return view('outcomes.show', compact('outcome'));
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
       $outcome = Outcome::findOrFail($id);
       // Get the key/name for the themes and pass to view
       $themes = OutcomeTheme::pluck('name', 'id');
       return view('outcomes.edit', compact('outcome', 'themes'));
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
        $outcome = Outcome::findOrFail($id);

        // Get upates from edit page and fill
        $input = $request->all();
        $outcome->update($input);

        return redirect('outcomes')->with('success', 'Information has been added');
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
        $outcome = Outcome::findOrFail($id);
        $outcome->delete();
        
        return redirect('outcomes')->with('success', 'Information has been deleted');
    }
}
