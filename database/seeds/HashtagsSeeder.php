<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Hashtag;

class HashtagsSeeder extends Seeder
{
    public function run(Hashtag $hashtag)
    {
    	$tags = file_get_contents(__DIR__.'/data/tags.txt');
        $tagsArray = explode(',', $tags);
        $tagsArray = array_unique($tagsArray);
        $inserData = [];
        foreach ($tagsArray as $tag) {
            $inserData[] = [
                'name' => trim($tag),
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ];    
        }

        Hashtag::insert($inserData);
    }
}
