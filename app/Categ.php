<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categ extends Model
{
    protected $table = 'categ';
    
    public $timestamps = true;    //поля времени updated_at
    
    protected $fillable = ['name','desc'];
    
    protected $primaryKey = 'id';  // указать назв., если не id
    
    public function news(){
        return $this-hasMany(News::class, 'idk');
    }

    
}
