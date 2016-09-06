<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class Test3Controller extends Controller
{

    /**
     * @Route("/test3", name="test3")
     * @Method({"POST"})
     */
    public function test3Action(Request $request)
    {
        $matrix = $request->request->get('matrix');
        $height = $request->request->get('height');
        $width = $request->request->get('width');

        /**
         * @TODO: 
         * 
         * Let's A be a matrix
         * A = [ 2  3  2  1 ]
         *     [ 5  2  3  1 ]
         *     [ 1  2  2  1 ]
         * width = 4
         * heigh = 3
         * 
         * You can move RIGTH or DOWN.
         * You cannot move UP or LEFT. 
         * 
         * Write a webservice that calculate the highest path sum in a matrix
         * following this rule (move only RIGTH or DOWN)
         *  
         * In this exemple : 
         *     [*2  3  2  1 ]
         *     [*5 *2 *3  1 ]
         *     [ 1  2 *2 *1 ] => 2 + 5 + 2 + 3 + 2 + 1 => 15
         */
        
        $result = -1;
        
        return new Response($result, JsonResponse::HTTP_OK);
    }
}