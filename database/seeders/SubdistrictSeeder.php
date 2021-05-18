<?php

namespace Database\Seeders;

use App\Models\Subdistrict;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class SubdistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 500; $i++) {
            $response = Http::withHeaders([
                'key' => '271fc7c631677fe6b27686dc2e65dad6',
            ])->get("https://pro.rajaongkir.com/api/subdistrict?city=".$i);
    
            $data[] = $response['rajaongkir']['results'];
        }

        for ($i = 0; $i < 500; $i++) {
            foreach($data[$i] as $sub)
            {
                $data_sub[] = [
                    'id' => $sub['subdistrict_id'],
                    'city_id' => $sub['city_id'],
                    'nama_subdistrict' => $sub['subdistrict_name'],
                ];
            }
        }

        Subdistrict::insert($data_sub);
    }
}
