<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    
    public $timestamps = true;
    
    protected $fillable = ['name','desc', 'idk'];
    
    
    public function categ(){
        return $this->belongsTo(Categ::class, 'idk')->first();
    }
    
    public function srcn(){
        return $this->belongsTo(Srcn::class, 'idsrc')->first();
    }

}
