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
        $actual = json_decode($client->getResponse()->getContent());
        $this->assertEquals($expected, $actual);
    }

    public function testFailure()
    {
        $client = static::createClient();

        $client->request('POST', '/test4');
        $this->assertNotEquals(200, $client->getResponse()->getStatusCode());
        $this->assertNotEquals(500, $client->getResponse()->getStatusCode());
    }

    public function provider()
    {
        return [
            '-1' => [
                -1,
                [],
            ],
            '0' => [
                0,
                [],
            ],
            '1' => [
                1,
                [0],
            ],
            '5' => [
                5,
                [0, 1, 1, 2, 3],
            ],
            '8' => [
                8,
                [0, 1, 1, 2, 3, 5, 8, 13],
            ],
            '10' => [
                10,
                [0, 1, 1, 2, 3, 5, 8, 13, 21, 34],
            ],
            '78' => [
                48,
                [0,1,1,2,3,5,8,13,21,34,55,89,144,233,377,610,987,1597,2584,4181,6765,10946,17711,28657,46368,75025,121393,196418,317811,514229,832040,1346269,2178309,3524578,5702887,9227465,14930352,24157817,39088169,63245986,102334155,165580141,267914296,433494437,701408733,1134903170,1836311903],
            ],
        ];
    }
}