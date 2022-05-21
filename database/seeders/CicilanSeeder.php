<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cicilan;

class CicilanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cicilan1 = new Cicilan;
        $cicilan1 -> waktu = "6 Bulan";
        // $cicilan1 -> waktu = "";    
        $cicilan1 -> save();

        $cicilan2 = new Cicilan;
        $cicilan2 -> waktu = "1 Tahun";
        // $cicilan2 -> waktu = "";    
        $cicilan2 -> save();

        $cicilan3 = new Cicilan;
        $cicilan3 -> waktu = "2 Tahun";
        // $cicilan3 -> waktu = "";    
        $cicilan3 -> save();

        $cicilan4 = new Cicilan;
        $cicilan4 -> waktu = "3 Tahun";
        // $cicilan4 -> waktu = "";    
        $cicilan4 -> save();
    }
}
