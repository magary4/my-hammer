<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ApiCallTest extends WebTestCase
{

    private $client;

    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function tearDown() {
        $this->client = null;
    }

    public function addNotFoundDataProvider() {
        return [
            ['/'],
            ['/api/v1'],
            ['/api/v1/claim']
        ];
    }

    /**
     * @dataProvider addNotFoundDataProvider
     */
    public function testNotFound($url)
    {
        $this->client->request('GET', $url);

        $this->assertEquals(404, $this->client->getResponse()->getStatusCode());
    }

    public function addErrorDataProvived()
    {
        return [
            ['/api/v1/claim/update','GET'],
            ['/api/v1/claim/update','POST'],
            ['/api/v1/claim/delete','PATCH']
        ];
    }

    /**
     * @dataProvider addErrorDataProvived
     */
    public function testWrongMethod( $url, $method )
    {
        $this->client->request($method, $url);

        $this->assertEquals(404, $this->client->getResponse()->getStatusCode());
    }

    public function testEmptyInput()
    {
        $this->client->request("POST", '/api/v1/claim/create');

        $this->assertEquals(409, $this->client->getResponse()->getStatusCode());
    }

    public function testCreationSuccess()
    {
        $this->client->request(
            "POST",
            '/api/v1/claim/create',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                "title" => "lorem isput dolor",
                "zip" => 88131,
                "city" => "Au",
                "description" => "Sudah merupakan fakta bahwa seorang pembaca akan terpen Ipsum ",
                "due_date" => "2019-12-12",
                "category" => "802030"
            ])
        );

        $this->assertEquals(201, $this->client->getResponse()->getStatusCode());
    }

    public function testCreationFail()
    {
        $this->client->request(
            "POST",
            '/api/v1/claim/create',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                "title" => "lorem isput dolor",
                "zip" => 88131,
                "city" => "Au"
            ])
        );

        $this->assertEquals(409, $this->client->getResponse()->getStatusCode());
    }
}