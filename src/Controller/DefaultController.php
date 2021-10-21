<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component;

class DefaultController extends AbstractController
{


    public function index(): Response
    {
        return new Response(
            '<html><body>Hello World </body></html>'
        );
    }
}
