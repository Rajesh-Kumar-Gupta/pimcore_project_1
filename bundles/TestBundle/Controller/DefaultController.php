<?php

namespace TestBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends FrontendController
{
    /**
     * @Route("/home")
     */
   
    public function indexAction(Request $request): Response{
        //return $this->render('/testBundle/includes/home.html.twig');
        return $this->render('@TestBundle/includes/home.html.twig');
        
    }
}
