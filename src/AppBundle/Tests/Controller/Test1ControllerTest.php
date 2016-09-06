<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class Test1ControllerTest extends WebTestCase
{
    /**
     * @dataProvider provider
     */
    public function testSuccess($list, $expected)
    {
        $client = static::createClient();

        $client->request('POST', '/test1', ['list' => $list]);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $actual = json_decode($client->getResponse()->getContent());
        $this->assertEquals($expected, $actual);
    }
    
    public function testFailure()
    {
        $client = static::createClient();

        $client->request('POST', '/test1');
        $this->assertNotEquals(500, $client->getResponse()->getStatusCode());
    }
    
    public function provider()
    {
        return [
            'empty list' => [
                [],
                [
                    'forLoop'     => 0,
                    'foreachLoop' => 0,
                    'whileLoop'   => 0,
                    'recursion'   => 0,
                ]
            ],
            'Single list' => [
                [2],
                [
                    'forLoop'     => 2,
                    'foreachLoop' => 2,
                    'whileLoop'   => 2,
                    'recursion'   => 2,
                ]
            ],
            'Basic list' => [
                [2, 3, 4],
                [
                    'forLoop'     => 9,
                    'foreachLoop' => 9,
                    'whileLoop'   => 9,
                    'recursion'   => 9,
                ]
            ],
            'Negative number list' => [
                [2, -12, 3],
                [
                    'forLoop'     => -7,
                    'foreachLoop' => -7,
                    'whileLoop'   => -7,
                    'recursion'   => -7,
                ]
            ],
            'Decimal number list' => [
                [2, 3.14, 6.21],
                [
                    'forLoop'     => 11.35,
                    'foreachLoop' => 11.35,
                    'whileLoop'   => 11.35,
                    'recursion'   => 11.35,
                ]
            ],
            'Letter list' => [
                [2, 'a', 3, 'H'],
                [
                    'forLoop'     => 5,
                    'foreachLoop' => 5,
                    'whileLoop'   => 5,
                    'recursion'   => 5,
                ]
            ],
        ];
    }
}
