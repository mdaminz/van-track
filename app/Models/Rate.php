<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function van()
    {
        return $this->belongsTo(Van::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
