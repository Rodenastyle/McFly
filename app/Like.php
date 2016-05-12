<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    public function nota(){
        return $this->hasOne('App\Nota', 'id', 'nota_id');
    }
}
