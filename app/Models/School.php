<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function rates()
    {
        return $this->hasMany(Rate::class, 'school_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'school_id');
    }
}
