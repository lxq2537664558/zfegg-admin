<?php
namespace Zfegg\Admin\V1\Rest\UserRoles;

use Zend\Db\TableGateway\TableGateway;

class UserRolesResourceFactory
{
    public function __invoke($services)
    {
        $tables        = $services->get('config')['zfegg-admin']['tables'];
        $tableName     = $tables['user_roles'];
        $roleTableName = $tables['roles'];
        $table         = new TableGateway($tableName, $services->get('db-zfegg-admin'));

        return new UserRolesResource($table, $roleTableName);
    }
}
