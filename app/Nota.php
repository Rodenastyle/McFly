<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    //
    public function likes(){
        return $this->hasMany('App\Like');
    }
}
