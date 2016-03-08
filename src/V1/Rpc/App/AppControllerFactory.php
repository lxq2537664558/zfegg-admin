<?php

namespace Zfegg\Admin\V1\Rpc\App;


use Zend\Mvc\Controller\ControllerManager;

class AppControllerFactory
{
    public function __invoke(ControllerManager $cm)
    {
        return new AppController($cm->getServiceLocator()->get('config')['zfegg-admin']['ui']);
    }
}