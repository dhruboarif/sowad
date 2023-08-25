<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\CashWallet;
//use App\Models\AddMoney;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'user_name',
        'email',
        'national_id',
        'number',
        'gender',
        'country',
        'birth',
        'address',
        'nominee',
        'nominee_email',
        'package_id',
        'parent_id',
        'placement_id',
        'sponsor',
        'position',
        'password',
        'left_count',
        'right_count',
        'left_active',
        'right_active',
        'left_total',
        'right_total',
        'left_side',
        'right_side',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $appends = ['referral_link'];
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    

    public function packages()
    {
        return $this->belongsTo(Package::class,'package_id')->where('status','Active');
    }
    public function sponsors()
    {
        return $this->belongsTo(User::class,'sponsor');
    }
    public function placements()
    {
        return $this->hasMany(User::class,'placement_id','user_name');
    }
    public function childs()

    {
        return $this->hasMany(User::class,'parent_id');
    }
    // recursive, loads all descendants
    public function position()
    {
        return $this->hasMany(User::class,'placement_id','user_name');
    }
    public function childrenRecursive()
    {
        return $this->position()->with('childrenRecursive');
    }

    public function receiver_cash()
    {
        return $this->belongsTo(CashWallet::class,'receiver_id');
    }
      public function sender()
    {
        return $this->belongsTo(User::class,'received_from');
    }
    

public function getReferralLinkAttribute()
{
    return $this->referral_link = route('register', ['ref' => $this->user_name]);
}



}
