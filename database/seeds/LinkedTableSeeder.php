<?php

use App\Linked;
use Illuminate\Database\Seeder;

class LinkedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $linked_array = [
        	[
        		'icon' => '',
        		'name' => 'fb',
        		'path' => 'https://facebook.com/',
        	],
        	[
        		'icon' => '',
        		'name' => 'vk',
        		'path' => 'https://vk.com/',
        	],
        	[
        		'icon' => '',
        		'name' => 'instagram',
        		'path' => 'https://instagram.com/',
        	],
        	[
        		'icon' => '',
        		'name' => 'youtube',
        		'path' => 'https://youtube.com/',
        	],
        ];

        foreach ($linked_array as $linked) {
	        Linked::create([
        		'icon' => $linked['icon'],
        		'name' => $linked['name'],
        		'path' => $linked['path'],
	        ]);
        }
    }
}
