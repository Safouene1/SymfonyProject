<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/{max}")
     */
    public function number( $max): Response
    {
        if (!is_numeric($max)){
            throw new Exception('Something went wrong!');
        }
        else {
            $number= random_int(0,$max);
            return $this->render('lucky/index.html.twig', [
                'number' => $number,
            ]);
        }

    }
}
