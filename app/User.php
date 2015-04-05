<?php namespace PopStat;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

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

    public function profile()
    {
        return $this->hasOne('PopStat\Profile');
    }

	public function roles()
    {
        return $this->belongsToMany('PopStat\Role')->withTimestamps();
    }

    public function assignRole($role)
    {
        return $this->roles->attach($role);
    }

    public function revokeRole($role)
    {
        return $this->roles()->detach($role);
    }

    public function isA($roleName)
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == $roleName)
            {
                return true;
            }
        }

        return false;
    }

    public function getName()
    {
        if ( $this->profile->middle_name )
        {
            return $this->profile->first_name . ' ' . $this->profile->middle_name . ' ' . $this->profile->last_name;
        }
        return $this->profile->first_name . ' ' . $this->profile->last_name;
    }
}
