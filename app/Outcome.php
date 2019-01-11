<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
//  List fields that can be filled all at once for ease of create,update
    protected $fillable = ['name', 'description', 'outcome_theme_id'];

//  Return all courses that have this outcome associated in pivot table
    function courses() {
        return $this->belongsToMany('App\Course')->withPivot('year', 'fraction');
    }

    function theme() {
        return $this->belongsTo('App\OutcomeTheme');
    }
}
