<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::withHeaders([
            'key' => '5eda6ae5200ee59c5d24b4a0e2077cf4'
        ])->get('https://api.rajaongkir.com/starter/city');
        $Citys = $response['rajaongkir']['results'];

        foreach($Citys as $city){
            $data_city[] = [
                'id' => $city['city_id'],
                'province_id' => $city['province_id'],
                'city_name' => $city['city_name'],
                'type' => $city['type'],
                'postal_code' => $city['postal_code']
            ];
        }

        City::insert($data_city);
    }
}
