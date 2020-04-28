<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPhone extends Model
{
    protected $fillable = ['user_id','phone'];
    public function users()
    {
        return $this->hasOne(User::class);
    }
}
