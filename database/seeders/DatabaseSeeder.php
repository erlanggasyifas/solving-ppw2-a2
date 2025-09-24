<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
public function run(): void
    {
        Book::factory()->create([
            'title' => 'The Pragmatic Programmer',
            'author' => 'Andrew Hunt, David Thomas',
            'published_year' => 1999,
            'genre' => 'Software',
            'cover_url' => 'https://images-na.ssl-images-amazon.com/images/I/41as+WafrFL._SX380_BO1,204,203,200_.jpg',
            'description' => 'Classic book on pragmatic approaches to software development.'
        ]);


        Book::factory()->create([
            'title' => 'Clean Code',
            'author' => 'Robert C. Martin',
            'published_year' => 2008,
            'genre' => 'Software',
            'cover_url' => null,
            'description' => 'Handbook of Agile Software Craftsmanship.'
        ]);
    }
}
