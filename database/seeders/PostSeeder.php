<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use App\Models\Post;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\PseudoTypes\True_;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            Post::create([
                'user_id' => 1,
                'titulo' => $faker->words(3, true),
                'descricao' => $faker->sentence(4),
                'imagem_capa' => 'images/posts/1WAoIg6DADC7pVFXSZ6XVWwYCpogg7QnZnGWEfpg.jpg',
                'conteudo' => $faker->text(),
                'visivel' => true,
            ]);
        }
    }
}
