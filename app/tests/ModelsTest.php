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

        $this->seed();
    }

    public function test_user_givenID_getUsername()
    {
        $user = User::find(1);

        $this->assertStringMatchesFormat('%s', $user->username);
    }

    public function test_balloon_givenPageAndLang_fetchAll()
    {
        // TODO: preconditions are sanitized text, delete me when a test exists

        $balloons = Balloon::page(2)->lang('en_GB')->get();

        $this->assertEquals('Too much cake.', $balloons[1]->text);
    }

}