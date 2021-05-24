<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::withHeaders([
            'key' => '271fc7c631677fe6b27686dc2e65dad6',
        ])->get('https://pro.rajaongkir.com/api/province');

        $provinces =  $response['rajaongkir']['results'];

        foreach($provinces as $province)
        {
            $data_province[] = [
                'id' => $province['province_id'],
                'nama_province' => $province['province'],
            ];
        }

        Province::insert($data_province);
    }
}
