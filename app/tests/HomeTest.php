<?php

/**
 *
 * HomeTest.php
 *
 * @author	Andrea Passaglia <gurghet@gmail.com>
 *
 */

class HomeTest extends TestCase {

    public function setUp() {
        parent::setUp();
        $this->stripMock = Mockery::mock('Eloquent', 'Strip');
    }

    public function tearDown() {
        Mockery::close();
    }
    
    public function test_home_page_returns_200OK() {

        $this->call('GET', '/');
        
        $this->assertResponseOk();
        
    }

    public function test_home_page_contains_strip() {

        $crawler = $this->client->request('GET', '/');

        $imgNode = $crawler->filterXPath('//*[@id="strip"]/img');
        $imgSrc = $imgNode->attr('src');

        $validImgUrl = '/[^\/\?\*\:\;\{\}]+\.(png|jpg)/';
        
        $this->assertRegExp($validImgUrl, $imgSrc);
        
    }

    public function test_strip_index_route_calls_lastPublished() {

        $this->stripMock
            ->shouldReceive('lastPublished->firstOrFail') // <- this is what is really tested
            ->andReturn('OK');

        $this->app->instance('Strip', $this->stripMock);

        $response = $this->action('GET', 'StripController@index');

        $this->assertResponseOk();
        $this->assertEquals('OK', $response->getContent());
        
    }
}