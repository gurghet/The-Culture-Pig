<?php
/**
 * UserTableSeeder.php
 *
 * @author    Andrea Passaglia <gurghet@gmail.com>
 */

class UserTableSeeder extends Seeder {
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 15; $i++) {
            $user = User::create([
                'username' => $faker->userName,
                'password' => $faker->word,
                'role' => $faker->randomElement(['admin',
                                                 'editor',
                                                 'reviewer',
                                                 'reader'])
            ]);
        }
    }
}
