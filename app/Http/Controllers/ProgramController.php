<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Course;
use App\Outcome;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $programs = Program::sortable()->paginate(10);
        return view('programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get course to pass to view
        $courses = Course::all();
        return view('programs.create', compact('courses'));
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
            'name' => 'required|max:50',
            'description' => 'required|max:200',
        ]);
        // Create new record with the form data
        $inputs = $request->all();
        $program = Program::create($inputs);

        // Add in pivot table elements for courses.  Note, only save those selected
        foreach ($inputs['ocheck'] as $key => $value) {
            if ($value > 0)
              $program->courses()->attach($key);
        }

        return redirect('programs')->with('success', 'Information has been added');
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
        $program = Program::findOrFail($id);
        return view('programs.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // Get course to pass to view
       $courses = Course::all();
       $oIdxOfId = [];
       $i = 0;
       foreach ($courses as $c) {
         $c->selected = null;
         $cIdxOfId[$c->id] = $i;
         $i++;
       }

       // Get record, pass to edit view
       $program = Program::findOrFail($id);

//    Add the fraction for all outcomes and topics that exists so we can fill in the form with existing values
       $pcourses = $program->courses;
//      dd($pcourses);
       foreach ($pcourses as $p) {
         $courses[$cIdxOfId[$p->pivot->course_id]]->selected = 1;
       }

       return view('programs.edit', compact('program', 'courses'));
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
        $program = Program::findOrFail($id);

        // Get upates from edit page and fill
        $inputs = $request->all();
        $program->update($inputs);
        
        // Add in pivot table elements for courses.  Note, only save those selected
        foreach ($inputs['ocheck'] as $key => $value) {
            if ($value > 0)
              $program->courses()->attach($key);
        }
        return redirect('programs')->with('success', 'Information has been added');
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
        $program = Program::findOrFail($id);
        $program->delete();
        
        return redirect('programs')->with('success', 'Information has been deleted');
    }

    /**
     * Analyze this pogram
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function analyze($id)
    {
        //
        $program = Program::findOrFail($id);
        $courses = $program->courses;
//        dd($courses);

        $outcomes = Outcome::all();
        $oIdxOfId = [];
        $i = 0;
        foreach ($outcomes as $o) {
            $o->amount = 0;
            $oIdxOfId[$o->id] = $i;
            $i++;
        }

        foreach ($courses as $c) {
          $coutcomes = $c->outcomes;
          foreach ($coutcomes as $co) {
              $outcomes[$oIdxOfId[$co->pivot->outcome_id]]->amount += $co->pivot->fraction;
          }
        }
        
        return view('programs.analyze', compact('program', 'courses', 'outcomes'));
    }

}
