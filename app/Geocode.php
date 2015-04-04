<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Geocode extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'geocodes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'latitude', 'longitude', 'countryname'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

}
