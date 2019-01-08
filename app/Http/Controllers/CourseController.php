<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Outcome;
use App\Topic;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $courses = Course::all();
        $courses = Course::sortable()->paginate(20);
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get outcomes and topics to pass to view
        $outcomes = Outcome::all();
        $topics = Topic::all();
        return view('courses.create', compact('outcomes', 'topics'));
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
            'short_description' => 'required',
            'description' => 'required',
            'year' => 'required|numeric',
        ]);

        // Create new record with the form data
        $inputs = $request->all();
 //       dd($inputs);
        $course = Course::create($inputs);

        // Add in pivot table elements for outcomes and topics.  Note, only save those with non-zero fractions to reduce clutter
        foreach ($inputs['ofrac'] as $key => $value) {
            if ($value > 0)
              $course->outcomes()->attach($key, ['fraction'=>$value, 'year'=>2018]);
        }
        foreach ($inputs['tfrac'] as $key => $value) {
            if ($value > 0)
                $course->topics()->attach($key, ['fraction'=>$value, 'year'=>2018]);
        }
        return redirect('courses')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
      $course = Course::findOrFail($id);
//      dd ($course);
      return view('courses.show', compact('course'));
  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // Get outcomes and topics to pass to view
      $outcomes = Outcome::all();
      $topics = Topic::all();
      $oIdxOfId = [];
      $tIdxOfId = [];
      $i = 0;
      foreach ($outcomes as $o) {
        $o->fraction = null;
        $oIdxOfId[$o->id] = $i;
        $i++;
      }
      $i = 0;
      foreach ($topics as $t) {
        $t->fraction = null;
        $tIdxOfId[$t->id] = $i;
        $i++;
      }
//      dd($outcomes);

      $course = Course::findOrFail($id);

//    Add the fraction for all outcomes and topics that exists so we can fill in the form with existing values
      $coutcomes = $course->outcomes;
//      dd($coutcomes);
      foreach ($coutcomes as $co) {
        $outcomes[$oIdxOfId[$co->pivot->outcome_id]]->fraction = $co->pivot->fraction;
      }
//      dd($outcomes);

      $ctopics = $course->topics;
      foreach ($ctopics as $ct) {
        $topics[$tIdxOfId[$ct->pivot->topic_id]]->fraction = $ct->pivot->fraction;
        $topics[$tIdxOfId[$ct->pivot->topic_id]]->level = $ct->pivot->level;
      }
//      dd($topics);

      return view('courses.edit', compact('course', 'outcomes', 'topics'));
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
        // Get existing course
        $course = Course::findOrFail($id);
        $inputs = $request->all();
        $course->update($inputs);

        // Add in pivot table elements for outcomes and topics.  Note, only save those with non-zero fractions to reduce clutter
        foreach ($inputs['ofrac'] as $key => $value) {
            if ($value > 0)
                $course->outcomes()->attach($key, ['fraction'=>$value, 'year'=>2018]);
        }
        foreach ($inputs['tfrac'] as $key => $value) {
            if ($value > 0)
                $course->topics()->attach($key, ['fraction'=>$value, 'year'=>2018, 'level'=>$inputs['tlevel'][$key]]);
        }

        return redirect('courses')->with('success', 'Information has been added');
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
        $course = Course::find($id);
        $course->delete();
        
        return redirect('courses')->with('success', 'Information has been deleted');
    }
}
