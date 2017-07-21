<?php

namespace SymfonyApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\ResponseObject;

class DefaultController extends Controller
{

    protected $responseGenerator;

    public function __construct()
    {
        $this->responseGenerator = new ResponseObject();
    }

    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('SymfonyApiBundle:Default:index.html.twig');
    }

}
