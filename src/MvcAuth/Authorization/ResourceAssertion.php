<?php

namespace Zfegg\Admin\MvcAuth\Authorization;

use Zend\Db\Adapter\Adapter as DbAdapter;
use Zend\Db\Sql\Sql;
use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Assertion\AssertionInterface;
use Zend\Permissions\Acl\Resource\ResourceInterface;
use Zend\Permissions\Acl\Role\RoleInterface;

class ResourceAssertion implements AssertionInterface
{
    protected $roleWhitelists = [];

    protected $dbAdapter;

    protected $tables = [];

    /**
     * @return array
     */
    public function getRoleWhitelists()
    {
        return $this->roleWhitelists;
    }

    /**
     * @param array $roleWhitelists
     * @return $this
     */
    public function setRoleWhitelists($roleWhitelists)
    {
        $this->roleWhitelists = $roleWhitelists;
        return $this;
    }

    /**
     * @return array
     */
    public function getTables()
    {
        return $this->tables;
    }

    /**
     * @param array $tables
     * @return $this
     */
    public function setTables(array $tables)
    {
        $this->tables = $tables;
        return $this;
    }

    /**
     * @return DbAdapter
     */
    public function getDbAdapter()
    {
        return $this->dbAdapter;
    }

    /**
     * @param DbAdapter $dbAdapter
     * @return $this
     */
    public function setDbAdapter($dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
        return $this;
    }

    public function getRolesAndResources($roleId, $resourceId)
    {
        $sql    = new Sql($this->getDbAdapter());
        $select = $sql->select();
        $select->from($this->tables['user_roles']);
        $select->columns([]);
        $select->join(
            $this->tables['role_resources'],
            sprintf('%s.role_id=%s.role_id', $this->tables['user_roles'], $this->tables['role_resources'])
        );
        $select->where(['user_id' => $roleId]);
        $select->where(['resource' => $resourceId]);

        $statement = $sql->prepareStatementForSqlObject($select);
        return $statement->execute();
    }

    /**
     * Returns true if and only if the assertion conditions are met
     *
     * This method is passed the ACL, Role, Resource, and privilege to which the authorization query applies. If the
     * $role, $resource, or $privilege parameters are null, it means that the query applies to all Roles, Resources, or
     * privileges, respectively.
     *
     * @param  Acl $acl
     * @param  RoleInterface $role
     * @param  ResourceInterface $resource
     * @param  string $privilege
     * @return bool
     */
    public function assert(Acl $acl, RoleInterface $role = null, ResourceInterface $resource = null, $privilege = null)
    {
        if ($this->inWhitelist($role->getRoleId(), $resource->getResourceId(), $privilege)) {
            return false;
        }

        $rows = $this->getRolesAndResources($role->getRoleId(), $resource->getResourceId());

        foreach ($rows as $row) {
            $methods = explode(',', $row['methods']);
            if (in_array($privilege, $methods)) {
                return false;
            }
        }

        return true;
    }

    public function inWhitelist($role, $resource, $privilege)
    {
        $resource       = str_replace('\\', '-', $resource);
        $roleWhitelists = $this->getRoleWhitelists();

        foreach ($roleWhitelists as $rolePattern => $resourceWhitelists) {
            if (fnmatch($rolePattern, $role)) {
                foreach ($resourceWhitelists as $resourcePattern => $privileges) {
                    $resourcePattern = str_replace('\\', '-', $resourcePattern);
                    if (fnmatch($resourcePattern, $resource)) {
                        return empty($privileges) || in_array($privilege, $privileges);
                    }
                }
            }
        }

        return false;
    }
}
