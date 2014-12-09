<?php

class ExampleTest extends TestCase {

    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');
    }

    
	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function test_fetches_admin_users()
	{
        User::create(['username' => 'admin', 'role' => 'admin']);
        User::create(['username' => 'reader', 'role' => 'reader']);

        $users = User::admins()->get();

        $this->assertCount(1, $users);
	}

}
