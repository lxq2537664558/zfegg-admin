<?php

namespace Zfegg\Admin\Factory;


use Psr\Container\ContainerInterface;
use Zfegg\Admin\MvcAuth\Authorization\ResourceAssertion;
use Zfegg\Admin\V1\Rest\RoleResources\RoleResourcesResource;
use Zfegg\Admin\V1\Rest\UserRoles\UserRolesResource;

class ResourceAssertionFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $configs = $container->get('config');
        $subConfigs = $configs['zfegg-admin'];
        $apigilityConfigs = $configs['zf-apigility']['db-connected'];


        $tables = [
            'user_roles' => $apigilityConfigs[UserRolesResource::class]['table_name'],
            'role_resources' => $apigilityConfigs[RoleResourcesResource::class]['table_name'],
        ];

        $assertion = new ResourceAssertion();
        $assertion->setDbAdapter($container->get('db-zfegg-admin'));
        $assertion->setTables($tables);
        $assertion->setRoleWhitelists($subConfigs['mvc-auth']['role_whitelists']);

        return $assertion;
    }
}