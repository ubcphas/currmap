<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutcomeTheme extends Model
{
//  List fields that can be filled all at once for ease of create,update
    protected $fillable = ['name', 'description'];

    function outcomes() {
        return $this->belongsToMany('App\Outcome');
    }
}
