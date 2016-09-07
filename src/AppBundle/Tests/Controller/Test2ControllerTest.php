<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @group test2
 */
class Test2ControllerTest extends WebTestCase
{
    /**
     * @dataProvider provider
     */
    public function testSuccess($list1, $list2, $expectedList)
    {
        $client = static::createClient();

        $client->request('POST', '/test2', ['list1' => $list1, 'list2' => $list2]);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $actualList = json_decode($client->getResponse()->getContent());
        $this->assertEquals($expectedList, $actualList);
    }
    
    public function testFailure()
    {
        $client = static::createClient();

        $client->request('POST', '/test2');
        $this->assertNotEquals(200, $client->getResponse()->getStatusCode());
        $this->assertNotEquals(500, $client->getResponse()->getStatusCode());
    }
    
    public function provider()
    {
        return [
            'two empty list' => [
                [],
                [],
                []
            ],
            'first is empty' => [
                [],
                [1, 2, 3],
                [1, 2, 3]
            ],
            'second is empty' => [
                ["a", "b", "c"],
                [],
                ["a", "b", "c"],
            ],
            'same length' => [
                ["a", "b", "c"],
                [1, 2, 3],
                ["a", 1, "b", 2, "c", 3],
            ],
            'first is bigger' => [
                ["a", "b", "c", "d", "e"],
                [1, 2, 3],
                ["a", 1, "b", 2, "c", 3, "d", "e"],
            ],
            'second is bigger' => [
                ["a", "b", "c"],
                [1, 2, 3, 4, 5],
                ["a", 1, "b", 2, "c", 3, 4, 5],
            ],
        ];
    }
}
