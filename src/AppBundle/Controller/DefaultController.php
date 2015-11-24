<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     * @Method({"POST"})
     */
    public function indexAction(Request $request)
    {
        $lists = json_decode($request->getContent(), true);
        $list1 = $lists['list1'];// $request->request->get('list1'));
        $list2 = $lists['list2'];//$request->request->get('list2'));
        
        $finalList = array();

        /**
         * @TODO: 
         * Write a webservice that combines two lists by alternatingly taking 
         * elements. For exemple: given two lists [A, B, C] and [1, 2, 3], the 
         * results sould be [A, 1, B, 2, C, 3]
         */
        return new JsonResponse($finalList, JsonResponse::HTTP_OK);
    }
}