<?php

namespace Zfegg\Admin\V1\Rpc\Profile;


use Psr\Container\ContainerInterface;
use Zfegg\Admin\V1\Rest\RoleResources\RoleResourcesResource;
use Zfegg\Admin\V1\Rest\UserRoles\UserRolesResource;

class ProfileControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $configs  = $container->get('config');
        $menus    = isset($configs['zfegg-admin']['menus']) ? $configs['zfegg-admin']['menus'] : [];

        return new ProfileController(
            $container->get('Zfegg\\Admin\\V1\\Rest\\AdminUser\\AdminUserResource'),
            $container->get(UserRolesResource::class),
            $container->get(RoleResourcesResource::class . '\\Table'),
            $menus
        );
    }
}