<?php namespace popstat;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    protected $fillable = [
        'name'
    ];

    public function users()
    {
        return $this->belongsToMany('popstat\User');
    }

    public function permissions()
    {
        return $this->belongsToMany('popstat\Permission');
    }

}
