<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Test5Controller extends Controller
{

    /**
     * @Route("/test5", name="test5")
     * @Method({"POST"})
     */
    public function test5Action(Request $request)
    {
        $list = $request->request->get('list');
        
        /**
         * @TODO: 
         *  
         * Write a function that given a list of non negative integers, 
         * arranges them such that they form the largest possible number. 
         * 
         * For example, given [50, 2, 1, 9] the largest formed number is 95021.
         */
        
        $result = null;
        
        return new Response($result, Response::HTTP_OK);
    }
}