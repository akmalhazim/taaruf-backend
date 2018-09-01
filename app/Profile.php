<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';
    protected $primaryKey = 'user_id';
    protected $keyType = 'string';
    public function expertise() {
        return $this->hasMany('App\Expertise','user_id','user_id');
    }
}
