<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'slug' => 'code review',
                'name' => 'Code Review'
            ],
            [
                'slug' => 'javascript',
                'name' => 'Javascript'
            ],
            [
                'slug' => 'php',
                'name' => 'Php'
            ],
            [
                'slug' => 'golang',
                'name' => 'Golang'
            ],
            [
                'slug' => 'general',
                'name' => 'General'
            ],
            [
                'slug' => 'mix',
                'name' => 'Mix'
            ],
            [
                'slug' => 'reactjs',
                'name' => 'React Js'
            ],
            [
                'slug' => 'laravel',
                'name' => 'Laravel'
            ],
            [
                'slug' => 'query-builder',
                'name' => 'Query Builder'
            ],
            [
                'slug' => 'request',
                'name' => 'Request'
            ],
            
            [
                'slug' => 'servers',
                'name' => 'Servers'
            ],
            
            [
                'slug' => 'testing',
                'name' => 'Testing'
            ],
            [
                'slug' => 'vite',
                'name' => 'Vite'
            ],
            
        ]);
    }
}
