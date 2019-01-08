<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Level extends Model
{
    //
    use Sortable;
    public $sortable = ['id', 'level'];

//  List fields that can be filled all at once for ease of create,update
    protected $fillable = ['level', 'name'];
}
