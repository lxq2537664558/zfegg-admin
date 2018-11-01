<?php
namespace Zfegg\Admin\V1\Rest\RoleResources;

use Psr\Container\ContainerInterface;

class RoleResourcesResourceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $table = $container->get(RoleResourcesResource::class . '\\Table');

        return new RoleResourcesResource($table);
    }
}
