<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @group test6
 */
class Test6ControllerTest extends WebTestCase
{
    public function testSuccess()
    {
        $expected = array(
            "1+2+3-4+5+6+78+9",
            "1+2+34-5+67-8+9",
            "1+23-4+5+6+78-9",
            "1+23-4+56+7+8+9",
            "12+3+4+5-6-7+89",
            "12+3-4+5+67+8+9",
            "12-3-4+5-6+7+89",
            "123+4-5+67-89",
            "123+45-67+8-9",
            "123-4-5-6-7+8-9",
            "123-45-67+89",
            "1+2+3-4+5+6+78+9",
            "1+2+34-5+67-8+9",
            "1+23-4+5+6+78-9",
            "1+23-4+56+7+8+9",
            "12+3+4+5-6-7+89",
            "12+3-4+5+67+8+9",
            "12-3-4+5-6+7+89",
            "123+4-5+67-89",
            "123+45-67+8-9",
            "123-4-5-6-7+8-9",
            "123-45-67+89",
            "1+2+3-4+5+6+78+9",
            "1+2+34-5+67-8+9",
            "1+23-4+5+6+78-9",
            "1+23-4+56+7+8+9",
            "12+3+4+5-6-7+89",
            "12+3-4+5+67+8+9",
            "12-3-4+5-6+7+89",
            "123+4-5+67-89",
            "123+45-67+8-9",
            "123-4-5-6-7+8-9",
            "123-45-67+89"
        );

        $client = static::createClient();

        $client->request('POST', '/test6');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $actual = json_decode($client->getResponse()->getContent());
        
        $this->assertTrue(is_array($actual), 'Result is not an array');
        
        sort($expected);
        sort($actual);
        
        $this->assertEquals($expected, $actual);
    }
}