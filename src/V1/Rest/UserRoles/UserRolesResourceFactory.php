<?php

namespace Zfegg\Admin\V1\Rest\UserRoles;

use Psr\Container\ContainerInterface;

class UserRolesResourceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $configs = $container->get('config');
        $apigilityConfigs = $configs['zf-apigility']['db-connected'];
        $resourceName = 'Zfegg\\Admin\\V1\\Rest\\AdminRole\\AdminRoleResource';
        $roleTableName = $apigilityConfigs[$resourceName]['table_name'];

        return new UserRolesResource(
            $container->get(UserRolesResource::class . '\\Table'),
            $roleTableName
        );
    }
}
