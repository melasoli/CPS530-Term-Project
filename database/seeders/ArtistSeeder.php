<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artist;
use File;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/artists.json");
        $data = json_decode($json);

        foreach ($data->artists as $key => $value) {
            Artist::create([
                // Fill artist_name column with the values to the json names in artists.json
                'name' => $value->name
            ]);
        }
    }
}
