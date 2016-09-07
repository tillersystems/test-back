<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Test3Controller extends Controller
{
    /**
     * Matrix
     * 
     * @var array 
     */
    private $matrix;

    /**
     * Width
     * 
     * @var int 
     */
    private $width;

    /**
     * Height
     * 
     * @var int 
     */
    private $height;

    /**
     * @Route("/test3", name="test3")
     * @Method({"POST"})
     */
    public function test3Action(Request $request)
    {
        $this->matrix = $request->request->get('matrix');
        $this->width = $request->request->get('width');
        $this->height = $request->request->get('height');

        if (!is_array($this->matrix)) {
            return new JsonResponse(['error' => 'Bad parameters.'], JsonResponse::HTTP_BAD_REQUEST);
        }

        $result = $this->calculate(0, 0);

        return new Response($result, Response::HTTP_OK);
    }

    private function calculate($x, $y)
    {
        if ($x >= $this->width || $y >= $this->height) {
            return 0;
        } elseif (!isset($this->matrix[$y][$x])) {
            throw new HttpException(Response::HTTP_BAD_REQUEST, 'Width or Heigth to big.');
        } else {
            return $this->matrix[$y][$x] + max($this->calculate($x + 1, $y), $this->calculate($x, $y + 1));
        }
    }
}