<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function products() {
        return $this->hasMany('App\Product');
    }
}
