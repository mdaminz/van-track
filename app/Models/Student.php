<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'school_id', 'district', 'status'];

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'rfid_tag', 'rfid_tag'); // Join using rfid_tag
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'student_id');
    }

    public function rate()
    {
        return $this->belongsTo(Rate::class);
    }

// Optional shortcut to access van directly from student
    public function van()
    {
        return $this->hasOneThrough(Van::class, Rate::class, 'id', 'id', 'rate_id', 'van_id');
    }

    

}
