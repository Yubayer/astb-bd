<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function collection() {
        return $this->belongsTo('App\Collection');
    }

    public function images() {
        return $this->hasMany('App\Images');
    }

    // public function cart() {
    //     return $this->belongsTo('App\Cart');
    // }
}
