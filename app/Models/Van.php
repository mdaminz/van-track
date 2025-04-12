<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Van extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

}
