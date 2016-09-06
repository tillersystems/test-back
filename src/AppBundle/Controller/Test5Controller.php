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
        
        if (!is_array($list)) {
            return new JsonResponse(['error' => 'Bad parameters.'], JsonResponse::HTTP_BAD_REQUEST);
        }
        
        uasort($list, function ($a, $b) {
            return -strcmp($a, $b);
        });
        
        $result = '';
        foreach ($list as $value) {
            $result .= $value;
        }

        return new Response((int)$result, Response::HTTP_OK);
    }
}