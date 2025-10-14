<?php


namespace Database\Seeders;

use App\Models\Author;
use App\Models\Publication;
use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
       
        $authors = Author::factory()->count(10)->create();

       
        $publications = Publication::factory()->count(5)->create();

        
        Book::factory()->count(50)->create([
            'author_id' => function() use ($authors) {
                return $authors->random()->id;
            },
            'publication_id' => function() use ($publications) {
                return $publications->random()->id;
            }
        ]);
    }
}
