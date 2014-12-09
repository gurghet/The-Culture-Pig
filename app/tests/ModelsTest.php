<?php
/**
 * ModelsTest.php
 *
 * @author    Andrea Passaglia <gurghet@gmail.com>
 */

class ModelsTest extends TestCase {

    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');
    }

    public function test_user_givenID_getUsername()
    {
        //Eloquent::unguard();
        
        User::create(['username' => 'adminOne', 'password' => 'word', 'role' => 'admin']);
        User::create(['username' => 'reader', 'password' => '1234', 'role' => 'reader']);

        $user = User::find(1);

        $this->assertEquals('adminOne', $user->username);
    }
}