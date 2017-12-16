<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\AdminResetPasswordNotification;

class Admin extends Authenticatable
{
    //
	use Notifiable;

	protected $guard = 'admin';

	protected $dates = ['created_at', 'updated_at'];

	protected $table = 'admins';

	protected $fillable = [
		'username', 'email', 'password',
	];

	protected $hidden = [
		'password', 'remember_token',
	];

	protected $guarded = [
		'remember_token', 'created_at', 'updated_at',
	];

	public function sendPasswordResetNotification($token) {
		$this->notify(new AdminResetPasswordNotification($token));
	}
}
