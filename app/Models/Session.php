<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions';

    protected $casts = [
        'payload' => 'string',
        'last_activity' => 'integer',
        'user_id' => 'integer',
        'ip_address' => 'string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
