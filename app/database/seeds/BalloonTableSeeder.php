<?php
/**
 * BalloonTableSeeder
 *
 * @author    Andrea Passaglia <gurghet@gmail.com>
 */

class BalloonTableSeeder extends Seeder {
    public function run()
    {
        $faker = Faker\Factory::create();
        
        for ($i = 0; $i < 280; $i++) {
            $balloon = Balloon::create([
	    	    'text' => $faker->sentence,
                'lang' => $faker->locale,
                'pos_x' => $faker->numberBetween(-100, 4000),
                'pos_y' => $faker->numberBetween(-100, 4000),
                'strip_id' => $faker->numberBetween(0, 70),
                'user_id' => $faker->numberBetween(0, 120)
            ]);
        }
    }
}
