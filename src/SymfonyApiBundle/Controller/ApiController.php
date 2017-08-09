<?php

namespace SymfonyApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends DefaultController
{

    /**
     * @Route("/lucky/number")
     */
    public function numberAction()
    {
        $response = $this->responseGenerator;
        $number = mt_rand(0, 100);
        $response->setResponseData($number);
        $response->setStatus(true);
        $response->setMessage($this->get('translator')->trans('messages.success'));
        $serviceResponse = $response->getServiceResponse();
        return new Response($serviceResponse);
    }

}
