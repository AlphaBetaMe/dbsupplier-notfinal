<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'lname',
        'dob',
        'password',
        'role_as',
        'mstatus'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function audit_trail()
    {
        return $this->hasMany(AuditTrail::class);
    }


    public function log($message)

    {
             
        $message = ucwords($message);

        $data = [
            'user_id' => $this->id,
            'name' => $this->name,
            'date' => \Carbon\Carbon::parse(now())->toDateString(),
            'activity' => "{$this->name} $message"

        ];
         AuditTrail::query()->create($data);
    }

    public function timeLogs()
{
    return $this->hasMany(AttendanceLog::class);
}

    public function carts()
    {
        return $this->hasMany(Cart::class,'user_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'user_id');
    }
    

    

    
}
