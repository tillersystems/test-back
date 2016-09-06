<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class Test6Controller extends Controller
{
    /**
     * @Route("/test6", name="test6")
     * @Method({"POST"})
     */
    public function test6Action()
    {
        /**
         * @TODO: 
         *  
         * Write a program that outputs all possibilities to put + or - or 
         * nothing between the numbers 1, 2, ..., 9 (in this order) such that 
         * the result is always 100. 
         * 
         * For example: 1 + 2 + 34 – 5 + 67 – 8 + 9 = 100.
         * Formatted as "1+2+34-5+67-8+9".
         */
        
        $results = null;
        
        return new JsonResponse($results, JsonResponse::HTTP_OK);
    }
}