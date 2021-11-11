<?php

namespace Database\Factories;

use App\Models\Ordene;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdeneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ordene::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'formulario' => $this->faker->numberBetween(500,99999),
            // 'nombre' => $this->faker->name,
            'equipo' => $this->faker->name,
            'codigo' => $this->faker->numberBetween(1,999),
            'frecuencia' => $this->faker->randomElement(['Semanal', 'Mensual', 'Anual']),
            'mes' => $this->faker->randomElement(['Enero', 'Febrero', 'Marzo', 'Abril']),
            'horaInicio' => $this->faker->numberBetween(1,999),
            'horaFinal' => $this->faker->numberBetween(1,999),
            'tiempoTotal' => $this->faker->numberBetween(1,999),
            'actividades' => $this->faker->paragraph(),
        ];
    }
}
