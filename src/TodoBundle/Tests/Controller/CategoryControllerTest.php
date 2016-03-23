<?php

namespace TodoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class CategoryControllerTest extends WebTestCase
{

    protected $client;

    private function getClient(){
        $this->client = static::createClient();
    }

    /**
     * Test sur le formulaire de création
     * - On veut avoir un HTTP 200
     * - Le bouton Save doit être présent sur le formulaire
     */
    public function testNewCategoryForm(){
        $this->getCLient();
        $this->client->request('GET', '/category/list');
        $this->assertContains('html.response.302',            array($this->client->getResponse()->getStatusCode()));
    }

}