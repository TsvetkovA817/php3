<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Srcn extends Model
{
    protected $table = 'srcn';
    
    public $timestamps = true;    //поля времени updated_at
    
    protected $fillable = ['name','desc'];
    
    protected $primaryKey = 'id';  // указать назв., если не id
    
    public function news(){
        return $this-hasMany(News::class, 'idsrc');
    }

    
}
