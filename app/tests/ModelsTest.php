<?php
/**
 * ModelsTest.php
 *
 * @author    Andrea Passaglia <gurghet@gmail.com>
 */

use Carbon\Carbon;

class ModelsTest extends TestCase {

     public function setUp() {
         
         parent::setUp();

         Artisan::call('migrate');

     }


    public function test_published_scope_returns_published_strips() {

        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();

        Strip::create(['path' => 'in.jpg', 'publish' => '1993-12-14']);
        Strip::create(['path' => 'in.jpg', 'publish' =>  $today->toDateString()]);
        Strip::create(['path' => 'out.jpg', 'publish' => $tomorrow->toDateString()]);
        Strip::create(['path' => 'out.jpg', 'publish' => '2019-02-04']);
        
        $publishedStrips = Strip::published()->get();
        
        $this->assertCount(2, $publishedStrips);
        $this->assertEquals('in.jpg', $publishedStrips[0]->path);
        $this->assertEquals('in.jpg', $publishedStrips[1]->path);
    }

    public function test_lastPublished_returns_last_strip_published() {
        
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        Strip::create(['path' => 'no-dp.jpg', 'publish' => '1993-12-14']);
        Strip::create(['path' => 'ok1.jpg', 'publish' =>  $yesterday->toDateString()]);
        Strip::create(['path' => 'no-df.jpg', 'publish' => '2019-02-04']);

        $lastStrip = Strip::lastPublished()->get();

        $this->assertCount(1, $lastStrip, "It thinks there are " . count($lastStrip) . " last strips instead of 1.");
        $this->assertEquals('ok1.jpg', $lastStrip[0]->path);

        Strip::create(['path' => 'ok2.jpg', 'publish' =>  $today->toDateString()]);

        $lastStrip = Strip::lastPublished()->get();

        $this->assertCount(1, $lastStrip, "After adding the today's strip, it thinks there are " . count($lastStrip) . " last strips.");
        $this->assertEquals('ok2.jpg', $lastStrip[0]->path);
        
    }

}