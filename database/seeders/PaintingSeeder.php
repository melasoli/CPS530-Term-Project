<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Painting;
use File;

class PaintingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/paintings.json");
        $data = json_decode($json);

        foreach ($data->paintings as $key => $value) {
            Painting::create([
                'title' => $value->title,
                'creation' => $value->creation,
                'path' => $value->path,
                'artist_id' => $value->artist_id
            ]);
        }
    }
}
