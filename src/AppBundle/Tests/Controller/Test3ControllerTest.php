<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @group test3
 */
class Test3ControllerTest extends WebTestCase
{

    /**
     * @dataProvider provider
     */
    public function testSuccess($matrix, $width, $length, $expected)
    {
        $client = static::createClient();

        $client->request('POST', '/test3', ['matrix' => $matrix, 'width' => $width, 'length' => $length]);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $actualList = json_decode($client->getResponse()->getContent());
        $this->assertEquals($expected, $actualList);
    }

    public function testFailure()
    {
        $client = static::createClient();

        $client->request('POST', '/test3');
        $this->assertNotEquals(500, $client->getResponse()->getStatusCode());
    }

    public function testFailure2()
    {
        $client = static::createClient();

        $client->request('POST', '/test3', ['matrix' => [], 'width' => 1, 'length' => 1]);
        $this->assertNotEquals(500, $client->getResponse()->getStatusCode());
    }

    public function provider()
    {
        return [
            'Empty matrix' => [
                [],
                0,
                0,
                0,
            ],
            'Unique value matrix' => [
                [2],
                1,
                1,
                2,
            ],
            'Easy matrix' => [
                [[2, 3, 2, 1],
                    [ 5, 2, 3, 1],
                    [ 1, 2, 2, 1]],
                4,
                3,
                15,
            ],
            'Hard matrix' => [
                [[2, 3, 12, 1],
                    [ 5, 2, 3, 1],
                    [ 1, 2, 2, 1]],
                4,
                3,
                23,
            ],
            'Very Hard matrix' => [
                [[1, 4, 16, 16, 32],
                    [ 5, 6, 7, 8, 11],
                    [ 8, 21, 2, 2, 4],
                    [ 42, 4, 8, 7, 3]],
                5,
                4,
                87,
            ],
            'Care about width' => [
                [[2, 3, 2, 1],
                    [ 5, 2, 3, 1],
                    [ 1, 2, 2, 1]],
                3,
                3,
                14,
            ],
            'Care about height' => [
                [[2, 3, 2, 1],
                    [ 5, 2, 3, 1],
                    [ 1, 2, 2, 1]],
                4,
                2,
                13,
            ],
        ];
    }
}