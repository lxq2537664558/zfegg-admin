<?php
namespace Zfegg\Admin\V1\Rest\Menu;

use Zend\ServiceManager\ServiceManager;

class MenuResourceFactory
{
    public function __invoke(ServiceManager $serviceLocator)
    {
        $configs  = $serviceLocator->get('config');
        $menus    = isset($configs['zfegg-admin']['menus']) ? $configs['zfegg-admin']['menus'] : [];
        $resource = new MenuResource();
        $resource->setMenus($menus);

        return $resource;
    }
}
