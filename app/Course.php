<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Course extends Model
{
    //
    use Sortable;
    public $sortable = ['id', 'name', 'short_description', 'year'];

//  List fields that can be filled all at once for ease of create,update
    protected $fillable = ['name', 'short_description', 'description', 'year'];

//  Return any outcomes that have a pivot table entry, and return the pivot values listed as well
    function outcomes() {
        return $this->belongsToMany('App\Outcome')->withPivot('year', 'fraction');
    }
    function outcome($id) {
        return $this->belongsToMany('App\Outcome')->withPivot('year', 'fraction')->where('outcome_id', $id)->first();
    }
//  As above for topics
    function topics() {
        return $this->belongsToMany('App\Topic')->withPivot('year', 'fraction', 'level');
    }

//  As above for programs
    function programs() {
        return $this->belongsToMany('App\Program');
    }
}
