<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class Test4Controller extends Controller
{

    /**
     * @Route("/test4", name="test4")
     * @Method({"POST"})
     */
    public function test4Action(Request $request)
    {
        $n = $request->request->get('n');

        /**
         * @TODO: 
         *  
         * Write a webservice that computes the list of the first n Fibonacci 
         * numbers. By definition, the first two numbers in the Fibonacci 
         * sequence are 0 and 1, and each subsequent number is the sum of the 
         * previous two.
         * 
         * As an example, here are the first 10 Fibonnaci 
         * numbers: [0, 1, 1, 2, 3, 5, 8, 13, 21, 34].
         */
        
        $result = null;
        
        return new JsonResponse($result, JsonResponse::HTTP_OK);
    }
}