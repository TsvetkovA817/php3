<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    //1 Проверка открытия корневой страницы
    public function testHome()
    {
        $response = $this->get('/');
        $response->assertSeeText('Home');
        $response->assertSeeText('Все права');
        $response->assertDontSeeText('Управление Категориями');
        $response->assertDontSeeText('Управление Новостями');
        $response->assertStatus(200);
    }
	
	//2 Проверка пути и открытие формы добавления категории
	public function test_categ_form_show()
    {
        $response = $this->get('/admaddctg');
        $response->assertSeeText('Home');
        $response->assertSeeText('Все права');
        $response->assertDontSeeText('Управление Категориями');
        $response->assertDontSeeText('Управление Новостями');
        $response->assertStatus(200);
    }
	
    //3 Проверка пути и открытие формы добавления новости
	public function test_news_form_show()
    {
        $response = $this->get('/admAddNew'); 
        $response->assertSeeText('Home');
        $response->assertSeeText('Все права');
        $response->assertStatus(200);
    }

    //4 Проверка пути и открытие страницы всех новостей
	public function test_news_all_list_show()
    {
        $response = $this->get('/news');
        $response->assertDontSeeText('Управление Категориями');
        $response->assertDontSeeText('Управление Новостями');
        $response->assertStatus(200);
    }

    //5 Проверка пути и открытие страницы всех категорий 
	public function test_categ_all_list_show()
    {
        $response = $this->get('/newsKat');
        $response->assertSeeText('Home');
        $response->assertSeeText('Все права');
        $response->assertDontSeeText('Управление Категориями');
        $response->assertDontSeeText('Управление Новостями');
        $response->assertStatus(200);
    }

    
	//6 Проверка пути и открытие админ страницы
	public function test_admin_show()
    {
        $response = $this->get('/admin');
        $response->assertSeeText('Управление Категориями');
        $response->assertSeeText('Управление Новостями');
        $response->assertStatus(200);
    }

	//7 Проверка пути и открытие админ страницы Управления категориями
	public function test_admin_categ_show()
    {
        $response = $this->get('/adminc');

        $response->assertStatus(200);
    }

	//8 Проверка пути и открытие админ страницы Управления новостями
	public function test_admin_news_show()
    {
        $response = $this->get('/adminn');

        $response->assertStatus(200);
    }
    
    
    //9 Проверка пути, наличие и открытие страниц с новостями
	public function test_news_all_show()
    {
         $maxKol=4;
        
        for ($i = 1; $i <= $maxKol; $i++) {
        
          $response = $this->get('/news/' .trim((string)$i));
          $response->assertDontSeeText('Управление Категориями');
          $response->assertDontSeeText('Управление Новостями');
          $response->assertStatus(200);
            
        }
    }
    

    //10 Проверка пути, наличие и открытие страниц со списком новостей по выбранным категориям
	public function test_newsList_categ1_show()
    {
         $maxKol=3;
        
        for ($i = 1; $i <= $maxKol; $i++) {
        
          $response = $this->get('/newsOneKat/' .trim((string)$i));
          $response->assertDontSeeText('Управление Категориями');
          $response->assertDontSeeText('Управление Новостями');
          $response->assertStatus(200);
            
        }
    }
    

    
}
