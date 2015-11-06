<?php

namespace Zfegg\Admin\V1\Rpc\Profile;


use Zend\Mvc\Controller\ControllerManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProfileControllerFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {

        if ($serviceLocator instanceof ControllerManager) {
            $serviceLocator = $serviceLocator->getServiceLocator();
        }

        $configs = $serviceLocator->get('config');
        $menus   = isset($configs['zfegg-admin']['menus']) ? $configs['zfegg-admin']['menus'] : [];

        return new ProfileController(
            $serviceLocator->get('Zfegg\\Admin\\V1\\Rest\\AdminUser\\AdminUserResource'),
            $menus
        );
    }
}