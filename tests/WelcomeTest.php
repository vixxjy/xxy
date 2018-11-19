<?php
use Goutte\Client;

class WelcomeTest extends TestCase {
    
    public function testUserSeesWelcomeMessage() {
        $client = new Client();
        
        $crawler = $client->$request('GET', 'https://todo-smilezdev.c9users.io/');
        
        $this->assertEquals(200, $client->getResponse()->getStatus());
        
        $this->assertCount(1, $crawler->filter('h1:contains("welcome to TODOParrot")'));
    }
}
