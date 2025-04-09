<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'student_id',
        'user_id',
        'amount',
        'due_date',
        'status'
    ];

    use HasFactory;

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    // ✅ Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
