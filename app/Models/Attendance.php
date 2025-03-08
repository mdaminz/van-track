<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public function student()
    {
        return $this->belongsTo(Student::class, 'rfid_tag', 'rfid_tag'); // Join using rfid_tag
    }
}
