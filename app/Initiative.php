<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Initiative extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'initiatives';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['country', 'name', 'initiative_type', 'stakeholder', 'initiative_url', 'date'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

}
