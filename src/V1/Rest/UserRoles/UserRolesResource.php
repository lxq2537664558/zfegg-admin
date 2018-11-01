<?php
namespace Zfegg\Admin\V1\Rest\UserRoles;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Paginator\Adapter\DbSelect;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class UserRolesResource extends AbstractResourceListener
{
    protected $table;
    protected $userId;
    protected $roleTableName;

    public function __construct(TableGateway $tableGateway, $roleTableName)
    {
        $this->table = $tableGateway;
        $this->roleTableName = $roleTableName;
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $data = $this->retrieveData($data);
        $insertData = [
            'user_id' => $this->getUserId(),
            'role_id' => $data['role_id'],
        ];
        $this->table->insert($insertData);
        return $data;
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function fetchAll($params = [])
    {
        return $this->table->select(
            function (Select $select) {
                $select->columns([]);
                $select->join(
                    $this->roleTableName,
                    sprintf('%s.role_id=%s.role_id', $this->roleTableName, $this->table->getTable())
                );
                $select->where(['user_id' => $this->getUserId()]);
            }
        );

//        $adapter = new DbSelect($select, $this->table->getAdapter());
//        return new $this->collectionClass($adapter);
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        if (!$this->userId) {
            $this->userId = (int)$this->getEvent()->getRouteParam('user_id');
        }

        return $this->userId;
    }

    /**
     * @param int $userId
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * Retrieve data
     *
     * Retrieve data from composed input filter, if any; if none, cast the data
     * passed to the method to an array.
     *
     * @param mixed $data
     * @return array
     */
    protected function retrieveData($data)
    {
        $filter = $this->getInputFilter();

        if (null !== $filter) {
            return $filter->getValues();
        }

        return (array)$data;
    }
}
