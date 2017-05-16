<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'borrows';

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
    protected $fillable = ['student_id', 'book_id', 'borrow_date', 'return_date'];
    
    public function student()
    {
        return $this->belongsTo('App\Student');
    }
    
    public function book()
    {
        return $this->belongsTo('App\Book');
    }

    
}
