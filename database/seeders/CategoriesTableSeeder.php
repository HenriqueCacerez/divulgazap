<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => "Outro",
                'icon' => "other.svg"
            ],
            [
                'name' => "Academia",       
                'icon' => "gym.svg"
            ],
            [
                'name' => "Amor e Romance", 
                'icon' => "love.svg"
            ],
            [
                'name' => "Carros e Motos", 
                'icon' => "car.svg"
            ],
            [
                'name' => "Cidades",        
                'icon' => "city.svg"
            ],
            [
                'name' => "Compra e Venda", 
                'icon' => "ecommerce.svg"
            ],
            [
                'name' => "Desenhos e Animes", 
                'icon' => "cartoon.svg"
            ],
            [
                'name' => "Educação",       
                'icon' => "study.svg"
            ],
            [
                'name' => "Esportes",       
                'icon' => "sport.svg"
            ],
            [
                'name' => "Eventos",        
                'icon' => "events.svg"
            ],
            [
                'name' => "Figurinhas", 
                'icon' => "sticker.svg"
            ],
            [
                'name' => "Filmes e Séries", 
                'icon' => "movie.svg"
            ],
            [
                'name' => "Frases e Mensagens", 
                'icon' => "quote.svg"
            ],
            [
                'name' => "Amizade",        
                'icon' => "friend.svg"
            ],
            [
                'name' => "Tecnologia e Programação", 
                'icon' => "code.svg"
            ],
            [
                'name' => "Games",          
                'icon' => "game.svg"
            ],
            [
                'name' => "Memes",          
                'icon' => "meme.svg"
            ],
            [
                'name' => "Músicas",        
                'icon' => "music.svg"
            ],
            [
                'name' => "Notícias",       
                'icon' => "news.svg"
            ],
            [
                'name' => "Receitas",       
                'icon' => "food.svg"
            ],
            [
                'name' => "Vagas de Emprego", 
                'icon' => "job.svg"
            ],
            [
                'name' => "Viagem e Turismo", 
                'icon' => "travel.svg"
            ]
        ]);
    }
}
