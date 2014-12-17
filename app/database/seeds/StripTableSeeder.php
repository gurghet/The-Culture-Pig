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
        
        for ($i = 0; $i < 20; $i++) {
            $strip = Strip::create([
                'title' => $faker->sentence,
                'path' => $faker->image('/tmp', 690, 240, 'abstract'),
                'publish' => $faker->date(NULL, '2018-09-09')
            ]);
        }
    }
}
