<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\AdminResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

	protected $guard = 'user';

	protected $dates = ['created_at', 'updated_at'];

	protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	protected $guarded = [
		'remember_token', 'created_at', 'updated_at',
	];

	public function sendPasswordResetNotification($token) {
		$this->notify(new UserResetPasswordNotification($token));
	}
}
