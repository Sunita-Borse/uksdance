<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'name', 'email', 'password','status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

 protected $enumStatus = [
        'Registered' => 'Registered',
        'Pending' => 'Pending',
        'Rejected' => 'Rejected',
        'Inactive' => 'Inactive',
        'Active' => 'Active',
        'Deleted' => 'Deleted',
    ];

    public function getStatusAttribute($value)
    {
        return $this->enumStatus[$value] ?? $value;
    }

    public function getEnumStatus()
    {
        return $this->enumStatus;
    }
    public function studentinfo()
{
    return $this->hasOne(Studentinfo::class);
}
}
