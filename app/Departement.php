<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'departements';

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
    protected $fillable = ['name', 'type'];
    
    public function student()
    {
        return $this->hasOne('App\Student');
    }

    
}
