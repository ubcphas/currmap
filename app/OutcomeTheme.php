<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class OutcomeTheme extends Model
{
    //
    use Sortable;
    public $sortable = ['id', 'name'];

//  List fields that can be filled all at once for ease of create,update
    protected $fillable = ['name', 'description'];

    function outcomes() {
        return $this->belongsToMany('App\Outcome');
    }
}
