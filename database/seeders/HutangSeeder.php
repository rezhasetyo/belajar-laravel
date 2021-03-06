<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hutang;
use Carbon\Carbon;
use Faker\Factory as Faker;

class HutangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //    factory(App\Hutang::class, 20)->create();
            $faker = Faker::create();
                for ($i=1; $i <= 200; $i++) { 
                    \DB::table('hutang')->insert([
                        'nama' => $faker->name(),
                        'alamat' => $faker->streetAddress(),
                        'tanggal_hutang' => $faker->dateTime(),
                        'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                        // 'hutang'=>$faker->numberBetween($min = 5000, $max = 10000),
                        'hutang' => $faker->randomElement(['3000', '4000', '5000', '6000', 
                                                            '7000', '8000', '9000', '10000']),
                        'cicilan_id' => $faker->randomElement([1, 2, 3, 4]),
                        'jaminan' => $faker->randomElement(['ktp.jpg', 'ktp.jpg']),
                        'jatuhTempo'=>date('Y-m-d H:i:s'),
                        'created_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s')]);
                    }
                                  
    }   // Public Function Run
} // Class HutangSeeder