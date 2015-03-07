<?php namespace ThreeAccents\Users\Entities;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];



	/*****************************/
	/*
	 * Command Functions
	 */
	/****************************/

	public static function register($username, $first_name, $last_name, $email, $password, $slug)
	{
		return new static(compact('username', 'first_name', 'last_name', 'email', 'password', 'slug'));
	}



	/*****************************/
	/*
	 * RELATIONSHIPS
	 */
	/****************************/

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function skills()
	{
		return $this->belongsToMany('ThreeAccents\Users\Entities\Skill');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function details()
	{
		return $this->hasOne('ThreeAccents\Users\Entities\UserDetail');
	}

}
