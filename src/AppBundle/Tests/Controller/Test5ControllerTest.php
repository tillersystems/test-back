<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @group test5
 */
class Test5ControllerTest extends WebTestCase
{

    /**
     * @dataProvider provider
     */
    public function testSuccess($list, $expected)
    {
        $client = static::createClient();

        $client->request('POST', '/test5', ['list' => $list]);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $actual = json_decode($client->getResponse()->getContent());
        $this->assertEquals($expected, $actual);
    }

    public function testFailure()
    {
        $client = static::createClient();

        $client->request('POST', '/test5');
        $this->assertNotEquals(500, $client->getResponse()->getStatusCode());
    }

    public function provider()
    {
        return [
            '0' => [
                [],
                0,
            ],
            '1' => [
                [1],
                1,
            ],
            '21' => [
                [2, 1],
                21,
            ],
            '95021' => [
                [50, 2, 1, 9],
                95021,
            ],
            '8503502' => [
                [502, 503, 8],
                8503502,
            ],
        ];
    }
}