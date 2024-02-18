<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable as ScoutSearchable;
use App\Models\TypeUser;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, ScoutSearchable; // Asegúrate de incluir Searchable aquí

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Define los atributos que deseas indexar
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
    public function type()
    {
        return $this->belongsTo(TypeUser::class, 'type_user_id');
    }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function teacherCourses()
    {
        return $this->hasMany(Teacher::class);
    }
}
