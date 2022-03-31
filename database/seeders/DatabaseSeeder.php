<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'project_name' => $faker->company,
                'project_description' => $faker->paragraph,
                'project_code' => $faker->regexify('[A-Z]{5}[0-4]{3}'),
                'project_status' => $faker->numberBetween(0, 1)
            ];
        }
        DB::table('project')->insert($data);
    }
}
