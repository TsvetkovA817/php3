<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Orchestra\Parser\Xml\Facade as XmlParser;
use App\News;
use App\Services\XMLParserService;
use App\Jobs\NewsParsing;
use App\Resources;


class ParserController extends Controller
{
   public function index(int $rss){
       
       
     switch ((int)$rss) {
    case 1:
        $xml = XmlParser::load('https://news.yandex.ru/army.rss');
        break;
    case 2:
        $xml = XmlParser::load('https://news.yandex.ru/music.rss');
        break;
    case 3:
        $xml = XmlParser::load('https://news.yandex.ru/auto.rss');
        break;
             
     }
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
       //dd($data);
       
       $o='';
      
       $anews=$data['news']; //берем только массив новостей
       //dd($anews);      
       
       for ($i=0; $i<count($anews); $i++){

            //$news->fill($anews);
            //dd($news);
            //$news->fill(['name'=>$anews[$i]('title'), 'desc'=>anews[$i]('desc'), 'idk'=>$rss, 'link'=>anews[$i]('link'), 'guid'=>anews[$i]('guid')]);
           
           
           
             $a=[];   //готовим массив для записи в бд
             //заголовок удаляем nbsp, тэги 
             $a['name']=trim(str_replace(chr(194).chr(160), ' ', html_entity_decode(strip_tags(mb_substr($anews[$i]['title'],0,60))))); 
             //dd($a['name']);
             $a['desc']=$anews[$i]['description'];     //статья 
             $a['idk']=$rss;                                //ИД категория: 2=музыка, 1=Армия, 3=Авто
             $a['link']=$anews[$i]['link'];                 //ссылка на оригинал
             $a['guid']=trim($anews[$i]['guid']);           //ид
             $a['pubDate']=date('d.m.Y', strtotime($anews[$i]['pubDate']));  //дата публикации
             $a['idsrc']=2;  // ИД источник новостей: 2=яндекс
             //dd($a);
             
             $g=0;
             $g = News::query()->select('id')->where('guid', $a['guid'])->first(); //уже есть или нет в бд
             //dump($g);
             if(!$g){       //если новости нет - записываем
                 
                $news= new News();    //новая запись
                $news->fill($a);      //заполнили
                $isOk=$news->save();  //сохранили

                if($isOk){
                    $o .='сохранено ' .$i .'<br>';
                }
                else { $o .='не сохр: ' .$i.'<br>';
                }           
             }
            
          }
           
           $o .='<br><br> <a href="/adminn">Управление новостями</a><br>' ;
           return response($o); 
       
     }
    
    
           public function parser10(XMLParserService $parserService){
           
           $start=date('c');
           $rssLinks = [
               'https://news.yandex.ru/army.rss',
               'https://news.yandex.ru/auto.rss',
               'https://news.yandex.ru/cosmos.rss',
               'https://news.yandex.ru/music.rss'
               
           ];
           
           foreach ($rssLinks as $link){
               $parserService->saveNews($link);
           }
           return $start .' ' .date('c');
       }

    
       public function parser12(){
           
           $start=date('c');
           $rssLinks = [
               'https://news.yandex.ru/army.rss',
               'https://news.yandex.ru/auto.rss',
               'https://news.yandex.ru/cosmos.rss',
               'https://news.yandex.ru/music.rss'
               
           ];
           
           foreach ($rssLinks as $link){
                 NewsParsing::dispatch($link);
           }
           echo 'Импорт новостей добавлен в очередь задач, запустите воркер' .'<br>';
           return $start .' ' .date('c');
       }

   
       public function parser13(){
          
           $start=date('c');
           //берем ссылки из таблицы resources
           $rssLinks = Resources::query()->select('clink')->where('cstatus', 1)->get();
           //dd($rssLinks);
           
           foreach ($rssLinks as $key => $val ){
                 
                 $link=trim($val['clink']);
                 NewsParsing::dispatch($link);
           }
           echo 'Импорт новостей добавлен в очередь задач, запустите воркер' .'<br>';
           return $start .' ' .date('c');
           
       }
    
}
