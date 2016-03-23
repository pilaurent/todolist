<?php

namespace TodoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class TaskControllerTest extends WebTestCase
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
    public function testNewTaskForm(){
        $this->getCLient();
        $this->client->request('GET', '/task/create');
        $this->assertContains('html.response.200',            $this->client->getResponse()->getStatusCode());
        if (!empty($this)) {
            $this->assertContains('Save',   $this->client->getResponse()->getContent());
        }

    }

    public function testNewTaskSuccess(){
        $this -> getClient();
        $crawler = $this->client->request('GET','/task/create');
        $form = $crawler->filter('button[type=submit]')->form();

        $data = array(
            'task[libelle]' => 'task 1',
            'task[description]' => 'go to the supermarket',
            'task[statut]' => '1',
       );
        $this->client->submit($form,$data);

        $this->assertEquals('html.response.302',            $this->client->getResponse()->getStatusCode());
        $this->client->followRedirect();

        $this->assertEquals('html.response.200',            $this->client->getResponse()->getStatusCode());
        $this->assertContains('taskcontroller.added_success', $this->client->getResponse()->getContent());

    }

    public function testNewTaskFail(){
        $this -> getClient();
        $crawler = $this->client->request('GET','/task/create');
        $form = $crawler->filter('button[type=submit]')->form();

        $data = array(
            'task[libelle]' => 'task 1',
            'task[description]' => 'go to the supermarket',
            'task[statut]' => "TEST",
        );
        $this->client->submit($form,$data);

        $this->assertEquals('html.response.200',            $this->client->getResponse()->getStatusCode());
        $this->assertContains('taskcontroller.value_not_valid', $this->client->getResponse()->getContent());

    }


    public function testNewTaskError(){
        $this -> getClient();
        $crawler = $this->client->request('GET','/task/create');
        $form = $crawler->filter('button[type=submit]')->form();

        $crawler = $this->client->submit($form);
        $this->assertEquals('html.response.500',            $this->client->getResponse()->getStatusCode());
    }


}