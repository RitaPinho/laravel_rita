<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coach extends Model
{
    //
    use softDeletes;

    protected  $fillable = [
        'name', 'birth_date', 'country_id', 'team_id', 'photo'
    ];
    public function team() {
        return $this->belongsTo('App\Team', 'team_id');
    }
    public function country() {
        return $this->belongsTo('App\Country', 'country_id');
    }
}
