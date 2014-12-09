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
        User::create(['username' => 'adminOne', 'password' => 'word', 'role' => 'admin']);
        User::create(['username' => 'reader', 'password' => '1234', 'role' => 'reader']);

        $user = User::find(1);

        $this->assertEquals('adminOne', $user->username);
    }

    public function test_balloon_givenPageAndLang_fetchAll()
    {
        // TODO: preconditions are sanitized text, delete me when a test exists

        User::create(['username' => 'adminOne', 'password' => 'word', 'role' => 'admin']);
        Strip::create(['title' => 'Hello', 'path' => '/strips/hello.png', 'page' => '1', 'user_id' => '1']);
        Strip::create(['title' => 'strip', 'path' => '/strips/last.png', 'page' => '2', 'user_id' => '1']);
        Balloon::create(['text' => 'Hello!', 'lang' => 'en-GB', 'strip_id' => '1']);
        Balloon::create(['text' => 'I am Pig.', 'lang' => 'en-GB', 'strip_id' => '1']);
        Balloon::create(['text' => 'The cake!', 'lang' => 'en-GB', 'strip_id' => '2']);
        Balloon::create(['text' => 'Too much cake.', 'lang' => 'en-GB', 'strip_id' => '2']);
        Balloon::create(['text' => 'Troppa torta', 'lang' => 'it', 'strip_id' => '2']);

        $balloons = Balloon::page(2)->lang('en-GB')->get();

        $this->assertEquals('Too much cake.', $balloons[1]->text);
    }

}