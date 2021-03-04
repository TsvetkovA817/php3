<?php

use Illuminate\Database\Seeder;

class CategSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categ')->insert($this->getData());  
    }
	
	public function getData(){
	   $f=Faker\Factory::create('ru RU');
        $data=[];
        
        for ($i=0; $i<7; $i++){
            $name=$f->sentence(mt_rand(2,5));
            $data[]=[
                'name'=>$name,
                'desc'=>$f->text(mt_rand(20,80)),
                'created_at'=>now(),
                'updated_at'=>now()
                
            ];
        }
        return $data;
    }
	
}
