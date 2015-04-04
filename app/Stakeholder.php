<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Stakeholder extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'stakeholders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['country', 'name', 'type', 'functional_area', 'url'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function initiatives() {

        return $this->belongsToMany('App\Initiative', 'initiatives_stakeholders');

    }

}
