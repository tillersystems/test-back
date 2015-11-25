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
        $list1 = $request->request->get('list1');
        $list2 = $request->request->get('list2');

        if (!is_array($list1) || !is_array($list2)) {
            return new JsonResponse(['error' => 'Bad parameters.'], JsonResponse::HTTP_BAD_REQUEST);
        }

        $finalList = $this->arrayCombine($list1, $list2);

        return new JsonResponse($finalList, JsonResponse::HTTP_OK);
    }

    /**
     * Combine two arrays.
     * 
     * @param array $list1
     * @param array $list2
     */
    private function arrayCombine(array $list1, array $list2)
    {
        $combinedList = array();
        $minLength = min(count($list1), count($list2));

        for ($i = 0; $i < $minLength; $i++) {
            $combinedList[] = array_shift($list1);
            $combinedList[] = array_shift($list2);
        }

        return array_merge($combinedList, $list1, $list2);
    }
}