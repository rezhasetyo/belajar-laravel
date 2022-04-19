<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hutang;
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
                for ($i=1; $i <= 20; $i++) { 
                    \DB::table('hutang')->insert([
                        'nama' => $faker->name(),
                        'alamat' => $faker->streetAddress(),
                        'tanggal_lahir' => $faker->dateTime(),
                        'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                        // 'hutang'=>$faker->numberBetween($min = 5000, $max = 10000),
                        'hutang' => $faker->randomElement(['3000', '4000', '5000', '6000', 
                                                            '7000', '8000', '9000', '10000']),

                        'created_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s')]);
                    }
    }


}