<?php

namespace Likvm\DoBundle\Controller;

use Lsw\ApiCallerBundle\Call\HttpGetJson;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    private $do_api_method = 'droplets/';

    public function indexAction()
    {
        $res = $this->showAllActiveDroplets();
        if($res->status == 'OK')
        {
            $droplets = $res->droplets;
        }


        return $this->render('LikvmDoBundle:Default:index.html.twig', array('droplets' => $droplets));
    }

    public function showAllActiveDroplets()
    {
        $url = $this->container->getParameter('do_api_url') . $this->do_api_method;
        $params = (object)array(
            'client_id' => $this->container->getParameter('do_client_id'),
            'api_key' => $this->container->getParameter('do_api_key'),
        );

        return $this->get('api_caller')->call(new HttpGetJson($url, $params));

    }
}
