<?php
/**
 * StripTableSeeder
 *
 * @author    Andrea Passaglia <gurghet@gmail.com>
 */

class StripTableSeeder extends Seeder {
    public function run()
    {
        $faker = Faker\Factory::create();
        
        for ($i = 0; $i < 70; $i++) {
            $strip = Strip::create([
                'title' => $faker->sentence,
                'path' => $faker->image('/tmp', 690, 240, 'abstract'),
                'page' => $i+$faker->randomDigit,
                'publish' => $faker->date
            ]);
        }
    }
}
