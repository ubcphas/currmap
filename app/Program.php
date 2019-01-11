<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
//  List fields that can be filled all at once for ease of create,update
    protected $fillable = ['name', 'description'];

//  Return any courses that have a pivot table entry
    function courses() {
        return $this->belongsToMany('App\Course');
    }

}
