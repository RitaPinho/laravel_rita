<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    //
    use softDeletes;

    protected  $fillable = [
        'name', 'year', 'initials', 'country_id', 'division_id', 'photo'
    ];
    public function country() {
        return $this->belongsTo('App\Country', 'country_id');
    }
    public function division() {
        return $this->belongsTo('App\Division', 'division_id');
    }
}
