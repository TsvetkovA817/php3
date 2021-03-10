<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Osv extends Model
{
    protected $table = 'osv';
    
    public $timestamps = true;    //поля времени updated_at
    
    protected $fillable = ['name','desc','email'];
    
    protected $primaryKey = 'id';  // указать назв., если не id

}
