<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
//  List fields that can be filled all at once for ease of create,update
    protected $fillable = ['level', 'name'];
}
