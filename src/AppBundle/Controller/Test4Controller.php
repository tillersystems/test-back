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
        
        if ($n == 0) {
            return new JsonResponse([], JsonResponse::HTTP_OK);
        } elseif ($n == 1) {
            return new JsonResponse([0], JsonResponse::HTTP_OK);
        }
        
        $result = [0, 1];
        for ($i = 2; $i < $n; ++$i) {
            $result[] = $result[$i - 1] + $result[$i - 2];
        }
        
        return new JsonResponse($result, JsonResponse::HTTP_OK);
    }
}