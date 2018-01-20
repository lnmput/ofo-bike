<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements Transformable
{
    use TransformableTrait, Notifiable, HasApiTokens;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nickname',
        'mobile',
        'weixin_open_id',
        'gender',
        'avatar',
        'is_deposit',
        'deposit_money',
        'money'
    ];

    public $casts = [
        'is_deposit' => 'bool'
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
     * 骑行记录
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function riders()
    {
        return $this->hasMany(Rider::class, 'user_id');
    }

    public function bikes()
    {
        return $this->belongsToMany(
            Bike::class,
            'riders',
            'user_id',
            'bike_id')
            ->withTimestamps();
    }
}
