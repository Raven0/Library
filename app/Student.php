<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'departement_id'];
    
    public function departement()
    {
        return $this->belongsTo('App\Departement');
    }
    
    public function borrow()
    {
        return $this->hasMany('App\Borrow');
    }

    
}
