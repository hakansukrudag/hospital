<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function contactDetails()
    {
        return $this->belongsTo(Contact::class, 'fk_contact_id', 'id');
    }
    public function medicineDetails()
    {
        return $this->belongsTo(Medicine::class, 'fk_medicine_id', 'id');
    }

    public function appointmentDetails()
    {
        return $this->hasMany(Appointment::class, 'fk_user_id', 'id');
    }
}
