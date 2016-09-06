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
        
        if (!is_array($list)) {
            return new JsonResponse(['error' => 'Bad parameters.'], JsonResponse::HTTP_BAD_REQUEST);
        }
        
        $result = array(
            'forLoop' => $this->forLoopSum($list),
            'foreachLoop' => $this->foreachLoopSum($list),
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
        $sum = 0;
        $length = count($list);
        for ($i = 0; $i < $length; ++$i) {
            $sum += $list[$i];
        }
        return $sum;
    }
    
    /**
     * Foreach-loop solution.
     * 
     * @param array $list
     * @return int
     */
    private function foreachLoopSum(array $list)
    {
        $sum = 0;
        foreach ($list as $value) {
            $sum += $value;
        }
        return $sum;
    }
    
    /**
     * While-loop solution.
     * 
     * @param array $list
     * @return int
     */
    private function whileLoopSum(array $list)
    {
        $sum = 0;
        while (!empty($list)) {
            $sum += array_pop($list);
        }
        return $sum;
    }
    
    /**
     * Recursion solution.
     * 
     * @param array $list
     * @return int
     */
    private function recursionSum(array $list)
    {
        if (empty($list)) {
            return 0;
        } else {
            return array_pop($list) + $this->recursionSum($list);
        }
    }
}