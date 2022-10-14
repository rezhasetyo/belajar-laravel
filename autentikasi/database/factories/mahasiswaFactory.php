<?php

namespace Database\Factories;

use App\Models\mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class mahasiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = mahasiswa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->word,
        'nim' => $this->faker->word,
        'kelas' => $this->faker->word,
        'prodi' => $this->faker->word,
        'jurusan' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
