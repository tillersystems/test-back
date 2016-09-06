<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class Test2Controller extends Controller
{

    /**
     * @Route("/test2", name="test2")
     * @Method({"POST"})
     */
    public function test2Action(Request $request)
    {
        $list1 = $request->request->get('list1');
        $list2 = $request->request->get('list2');

        /**
         * @TODO: 
         * Write a webservice that combines two lists by alternatingly taking 
         * elements. For exemple: given two lists [A, B, C] and [1, 2, 3], the 
         * results sould be [A, 1, B, 2, C, 3]
         */
        
        $finalList = null;
        
        return new JsonResponse($finalList, JsonResponse::HTTP_OK);
    }
}