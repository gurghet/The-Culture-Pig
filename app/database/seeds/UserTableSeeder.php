<?php
/**
 * UserTableSeeder.php
 *
 * @author    Andrea Passaglia <gurghet@gmail.com>
 */

class UserTableSeeder
{
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $user = User::create([
                'username' => $faker->userName,
                'password' => $faker->word,
                'role' => array_rand(['admin','editor','reviewer','reader'])
            ]);
        }
    }
}
