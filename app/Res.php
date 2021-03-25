<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Res extends Model
{
    protected $table = 'resources';
    
    public $timestamps = true;    //поля времени updated_at
    
    protected $fillable = ['cname','cdesc','clink', 'cstatus'];
    
    protected $primaryKey = 'id';  // указать назв., если не id
    
  
}
