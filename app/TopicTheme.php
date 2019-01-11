<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicTheme extends Model
{
//  List fields that can be filled all at once for ease of create,update
    protected $fillable = ['name', 'description'];

    function topics() {
        return $this->belongsToMany('App\Topic');
    }
}
