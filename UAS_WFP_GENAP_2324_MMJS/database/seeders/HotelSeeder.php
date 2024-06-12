<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Str;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotels')->insert([
            ['name' => 'Catalina Inn',
            'address' => '2015 McFarland Blvd',
            'postcode' => '35476-2920',
            'city'=> 'Northport (Tuscaloosa Area)',
            'state'=> 'ALABAMA',
            'country'=> 'United States',
            'country_id'=> 'US',
            'longitude'=> 99297,
            'latitude'=> 37606,
            'phone'=> 61350233266,
            'fax'=> 6207232245,
            'email'=> 'info@yourdomain.com',
            'currency'=> 'USD',
            'accommodation_type'=> 'Hotel',
            'category'=> '5',
            'web'=> 'http://www.yourdomain.com/hotel',
            'image' => 'hotel1',
            'type_id' => 1],

            ['name' => 'Dothan Inn & Suites',
            'address' => '3285 Montgomery Hwy',
            'postcode' => '36303-2108',
            'city'=> 'Dothan',
            'state'=> 'ALABAMA',
            'country'=> 'United States',
            'country_id'=> 'US',
            'longitude'=> 14214,
            'latitude'=> 34203,
            'phone'=> 16204218000,
            'fax'=> 19137272777,
            'email'=> 'info@yourdomain.com',
            'currency'=> 'USD',
            'accommodation_type'=> 'Hostel',
            'category'=> '2',
            'web'=> 'http//www.yourdomain.com/hotel',
            'image' => 'hotel2',
            'type_id' => 2],

            ['name' => 'On the Beach',
            'address' => '337 E Beach Blvd',
            'postcode' => '36542-6505',
            'city'=> 'Gulf Shores',
            'state'=> 'ALABAMA',
            'country'=> 'United States',
            'country_id'=> 'US',
            'longitude'=> 14213,
            'latitude'=> 34204,
            'phone'=> 19136516000,
            'fax'=> 17858411901,
            'email'=> 'info@yourdomain.com',
            'currency'=> 'USD',
            'accommodation_type'=> 'Hostal',
            'category'=> '2',
            'web'=> 'http//www.yourdomain.com/hotel',
            'image' => 'hotel3',
            'type_id' => 3],

            ['name' => 'Athens Inn',
            'address' => '1329 US Highway 72 E',
            'postcode' => '35611-4405',
            'city'=> 'Athens',
            'state'=> 'ALABAMA',
            'country'=> 'United States',
            'country_id'=> 'US',
            'longitude'=> 99297,
            'latitude'=> 37606,
            'phone'=> 61350233266,
            'fax'=> 6207232245,
            'email'=> 'info@yourdomain.com',
            'currency'=> 'USD',
            'accommodation_type'=> 'Resort',
            'category'=> '4',
            'web'=> 'http//www.yourdomain.com/hotel',
            'image' => 'hotel4',
            'type_id' => 4],

            ['name' => 'Park Plaza Motor Inn',
            'address' => '3801 McFarland Blvd E',
            'postcode' => '35405-2403',
            'city'=> 'Tuscaloosa',
            'state'=> 'ALABAMA',
            'country'=> 'United States',
            'country_id'=> 'US',
            'longitude'=> 14214,
            'latitude'=> 34203,
            'phone'=> 16204218000,
            'fax'=> 19137272777,
            'email'=> 'info@yourdomain.com',
            'currency'=> 'USD',
            'accommodation_type'=> 'Appartment',
            'category'=> '5',
            'web'=> 'http//www.yourdomain.com/hotel',
            'image' => 'hotel5',
            'type_id' => 5]
        ]);
    }
}
