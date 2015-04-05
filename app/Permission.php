<?php namespace popstat;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {

    protected $fillable = [
        'name'
    ];

    public function roles()
    {
        return $this->belongsToMany('popstat\Role')->withTimestamps();
    }

}
