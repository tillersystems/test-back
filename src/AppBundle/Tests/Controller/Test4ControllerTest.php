<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @group test4
 */
class Test4ControllerTest extends WebTestCase
{

    /**
     * @dataProvider provider
     */
    public function testSuccess($n, $expected)
    {
        $client = static::createClient();

        $client->request('POST', '/test4', ['n' => $n]);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $actual = intval($client->getResponse()->getContent());
        $this->assertEquals($expected, $actual);
    }

    public function testFailure()
    {
        $client = static::createClient();

        $client->request('POST', '/test4');
        $this->assertNotEquals(500, $client->getResponse()->getStatusCode());
    }

    public function provider()
    {
        return [
            'Empty matrix' => [
                0,
                [],
            ],
            'Unique value matrix' => [
                1,
                [0],
            ],
            'Unique value matrix' => [
                10,
                [0, 1, 1, 2, 3, 5, 8, 13, 21, 34],
            ],
        ];
    }
}