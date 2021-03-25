<?php

namespace App\Services;

use Orchestra\Parser\Xml\Facade as XmlParser;
use App\News;
use Illuminate\Support\Facades\Storage;


class XMLParserService
{

    public function saveNews($link)
    {
  
       $xml = XmlParser::load($link);
       $data=$xml->parse([
          'title'=>['uses'=>'channel.title'
                   ] ,
          'link'=>['uses'=>'channel.link'
                   ] ,
         'description'=>['uses'=>'channel.description'
                   ] ,
          'image'=>['uses'=>'channel.image.url'
                   ] ,
          'news'=>['uses'=>'channel.item[title,link,guid,description,pubDate]'
                   ] 
           
       ]);
       dump($data);
       
       Storage::disk('publicLogs')->append('log.txt',date('c') .' ' .$link); 
       
       $nfile=str_replace('https://news.yandex.ru/','-',$link);
       
       Storage::disk('public')->put('news' .$nfile .'.json',json_encode($data, JSON_UNESCAPED_UNICODE));         
        
    }
    
    
}
