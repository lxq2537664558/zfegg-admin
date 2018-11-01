<?php
namespace Zfegg\Admin;

use Zend\Mvc\MvcEvent;
use Zend\Stdlib\ArrayUtils;
use ZF\Apigility\Provider\ApigilityProviderInterface;
use Zfegg\Admin\V1\Rest\RoleResources\RoleResourcesResource;
use Zfegg\Admin\V1\Rest\UserRoles\UserRolesResource;
use Zfegg\Admin\V1\Rest\UserRoles\UserRolesResourceTableFactory;

class Module implements ApigilityProviderInterface
{

    public function getConfig()
    {
        $configs = include __DIR__ . '/../config/module.config.php';
        $configs['zfegg-admin']['resources-documentation'] = include __DIR__ . '/../config/documentation.config.php';
        $configs = ArrayUtils::merge($configs, include(__DIR__ . '/../config/zfegg.config.php'));

        return $configs;
    }

    public function getServiceConfig()
    {
        return [

        ];
    }
}
