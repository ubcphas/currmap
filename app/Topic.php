<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
//  List fields that can be filled all at once for ease of create,update
    protected $fillable = ['name', 'description', 'topic_theme_id'];

//  Return all courses with this topic associated in pivot table
    function courses() {
        return $this->belongsToMany('App\Course')->withPivot('year', 'fraction', 'level');
    }

    function theme() {
        return $this->belongsTo('App\TopicTheme');
    }
}
