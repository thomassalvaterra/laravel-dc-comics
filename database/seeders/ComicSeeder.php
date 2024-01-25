<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comics;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array_comic = config("comics");

        foreach ($array_comic as $comic_item) {
            $nuovo_fumetto = new Comics();
            $nuovo_fumetto->title = $comic_item["title"];
            $nuovo_fumetto->description = $comic_item["description"];
            $nuovo_fumetto->thumb = $comic_item["thumb"];
            $nuovo_fumetto->price = $comic_item["price"];
            $nuovo_fumetto->series = $comic_item["series"];
            $nuovo_fumetto->sale_date = $comic_item["sale_date"];
            $nuovo_fumetto->type = $comic_item["type"];
            $nuovo_fumetto->save();
        }
    }
}
