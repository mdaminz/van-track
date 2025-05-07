<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'usertype'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class); // Join using rfid_tag
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'user_id');
    }

    // Define the accessor for the profile photo URL
    public function getProfilePhotoUrlAttribute()
    {
        if ($this->profile_photo_path) {
            // Assuming the photo is stored in the 'public' disk
            return asset('storage/' . $this->profile_photo_path);
        }

        // Default photo URL if no photo is uploaded
        return asset('images/default-profile.png');
    }

    public function report()
    {
        return $this->hasMany(Report::class, 'user_id');
    }

    public function forum()
    {
        return $this->hasMany(Forum::class, 'user_id');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'user_id');
    }

    public function van()
    {
        return $this->hasOne(Van::class);
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
