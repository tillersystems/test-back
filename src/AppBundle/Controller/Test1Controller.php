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
         * Write a webservice that compute the sum of the numbers in a given
         * list using a for-loop, foreach-loop, a while-loop, and recursion.
         */

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
        if (count($list) == 0)
            return -1;
        $sum = 0;
        for ($i = 0; $i <= count($list); $i++) {
            $sum = $list[$i] + $sum;
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
        if (count($list) == 0)
            return -1;
        $sum = 0;
        foreach ($list as $value){
            $sum = $value + $sum;
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
        if (count($list) == 0)
            return -1;
        $i = 0;
        $sum = 0;
        while ($i < count($list))
        {
            $sum = $list[$i] + $sum;
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
       return -1;
    }
}