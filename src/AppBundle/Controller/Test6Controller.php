<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class Test6Controller extends Controller
{
    /**
     * Result
     * 
     * @var array 
     */
    private $results = array();

    /**
     * @Route("/test6", name="test6")
     * @Method({"POST"})
     */
    public function test6Action()
    {
        $this->compute();

        return new JsonResponse($this->results, JsonResponse::HTTP_OK);
    }
    
    private function compute($index = 1, $tokens = array(0))
    {
        if ($index > 9) {
            $this->handle($tokens);
            return;
        }
        
        // sum
        $this->compute($index + 1, array_merge($tokens, ['+', $index]));
        // diff
        $this->compute($index + 1, array_merge($tokens, ['-', $index]));
        // nothing
        $lastPos = count($tokens) - 1;
        $tokens[$lastPos] = $tokens[$lastPos] * 10 + $index;
        $this->compute($index + 1, $tokens);
    }
    
    private function handle($tokens)
    {
        $length = count($tokens);
        
        $string = '';
        $result = 0;
        for ($i = 0; $i < $length; ++$i) {
            $token = $tokens[$i];
            if ($token === '+') {
                $operand = $tokens[++$i];
                $result += $operand;
                $string .= '+' . $operand;
            } elseif ($token === '-') {
                $operand = $tokens[++$i];
                $result -= $operand;
                $string .= '-' . $operand;
            } elseif ($token === 0) {
                ++$i;
            } else {
                $result = $tokens[$i];
                $string = $tokens[$i];
            }
        }
        
        if ($result === 100) {
            $this->results[] = $string;
        }
    }

}