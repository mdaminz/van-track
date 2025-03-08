<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'rfid_tag', 'rfid_tag'); // Join using rfid_tag
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
