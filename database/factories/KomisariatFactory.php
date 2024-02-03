<?php

namespace Database\Factories;

use App\Models\Komisariat;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class KomisariatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Komisariat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'komisariat' => 'Universitas Bengkulu',
        ];
    }
}
