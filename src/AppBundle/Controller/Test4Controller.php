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
        
        if (!is_numeric($n)) {
            return new JsonResponse(['error' => 'Bad parameters.'], JsonResponse::HTTP_BAD_REQUEST);
        }
        
        if ($n <= 0) {
            return new JsonResponse([], JsonResponse::HTTP_OK);
        }
        
        $result = [];
        $first20 = [0,1,1,2,3,5,8,13,21,34,55,89,144,233,377,610,987,1597,2584,4181,6765,10946,17711,28657,46368];
        for ($i = 0; $i < $n && $i < 25; ++$i) {
            $result[] = $first20[$i];
        }
        
        for ($i = 25; $i < $n; ++$i) {
            $result[] = $result[$i - 1] + $result[$i - 2];
        }
        
        return new JsonResponse($result, JsonResponse::HTTP_OK);
    }
}