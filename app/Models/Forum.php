<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); // Join using rfid_tag
    }
}
