<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());  
    }
    
    public function getData(){
	   $f=Faker\Factory::create('ru RU');
        $data=[];
        
        for ($i=0; $i<20; $i++){
            $name=$f->sentence(mt_rand(2,5));
            $data[]=[
                'name'=>$name,
                'desc'=>$f->realText(mt_rand(20,100)),
                'created_at'=>now(),
                'updated_at'=>now(),
                'idk'=> $f->numberBetween(1, 7),
                'idsrc'=> $f->numberBetween(1, 7)
                
            ];
        }
        return $data;
    }
}
