<?php

namespace Database\Factories;

use App\Models\ProjectModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectModelFactory extends Factory
{

    protected $model = ProjectModel::class;

    public function definition()
    {
        $faker = $this->faker;
        return [
            'project_name' => $faker->company,
            'project_description' => $faker->paragraph,
            'project_code' => $faker->regexify('[A-Z]{5}[0-4]{3}'),
            'project_status' => $faker->numberBetween(0, 1)
        ];
    }
}
