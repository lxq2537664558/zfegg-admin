<?php

namespace Zfegg\Admin\V1\Rpc\App;


use Psr\Container\ContainerInterface;
use Zend\Mvc\Controller\ControllerManager;

class AppControllerFactory
{
    public function __invoke(ContainerInterface $cm)
    {
        return new AppController($cm->get('config')['zfegg-admin']['ui']);
    }
}