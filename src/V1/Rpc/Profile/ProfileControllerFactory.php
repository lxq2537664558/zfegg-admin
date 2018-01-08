<?php

namespace Zfegg\Admin\V1\Rpc\Profile;


use Psr\Container\ContainerInterface;

class ProfileControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new ProfileController(
            $container->get('Zfegg\\Admin\\V1\\Rest\\AdminUser\\AdminUserResource')
        );
    }
}