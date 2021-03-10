<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zdt extends Model
{
    protected $table = 'zdt';
    
    public $timestamps = true;    //поля времени updated_at
    
    protected $fillable = ['name','desc','email','tlf','fio'];
    
    protected $primaryKey = 'id';  // указать назв., если не id

}
