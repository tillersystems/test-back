<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class Test1Controller extends Controller
{

    /**
     * @Route("/test1", name="test1")
     * @Method({"POST"})
     */
    public function test1Action(Request $request)
    {
        $list = $request->request->get('list');

        /**
         * @TODO: 
         * Write three functions that compute the sum of the numbers in a given 
         * list using a for-loop, a while-loop, and recursion.
         */
        
        $result = array(
            'forLoop' => $this->forLoopSum($list),
            'whileLoop' => $this->whileLoopSum($list),
            'recursion' => $this->recursionSum($list),
        );
        
        return new JsonResponse($result, JsonResponse::HTTP_OK);
    }
    
    /**
     * For-loop solution.
     * 
     * @param array $list
     * @return int
     */
    private function forLoopSum(array $list)
    {
        return -1;
    }
    
    /**
     * While-loop solution.
     * 
     * @param array $list
     * @return int
     */
    private function whileLoopSum(array $list)
    {
        return -1;
    }
    
    /**
     * Recursion solution.
     * 
     * @param array $list
     * @return int
     */
    private function recursionSum(array $list)
    {
        return -1;
    }
}