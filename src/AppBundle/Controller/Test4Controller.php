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
        for ($i = 0; $i < $n; ++$i) {
            if (array_key_exists($i-1, $result) && array_key_exists($i-2, $result)) {
                $result[] = $result[$i-1] + $result[$i-2];
            }
            else {
                $result[] = $i;
            }
            /**
            * Another easier way to do this :
            * $result[] = round(pow((sqrt(5)+1)/2, $i) / sqrt(5));
            */
        }
        
        return new JsonResponse($result, JsonResponse::HTTP_OK);
    }
}