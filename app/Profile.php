<?php namespace PopStat;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

	protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'date_of_birth',
        'gender',
        'eye_colour',
        'blood_type',
        'first_language',
        'footed',
        'handed',
        'fathers_first_name',
        'fathers_middle_name',
        'fathers_last_name',
        'mothers_first_name',
        'mothers_middle_name',
        'mothers_last_name'
    ];

    protected $dates = [
        'date_of_birth'
    ];

    public function user()
    {
        return $this->belongsTo('PopStat\User');
    }

}
