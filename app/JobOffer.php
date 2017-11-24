<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    protected $fillable = [
        'title', 'description','date','skills','company_id'
    ];


    public function companies(){
        return $this->belongsTo('App\Company');
    }

    public function users(){
        return $this->belongsToMany('\App\User');
    }
}
