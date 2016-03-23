<?php

namespace TodoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertEquals('html.response.302',            $this->client->getResponse()->getStatusCode());
        $this->client->followRedirect();

        /*$this->assertContains('homepage.hello_world', $client->getResponse()->getContent());*/
    }
}
