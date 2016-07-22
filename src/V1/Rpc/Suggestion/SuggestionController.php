<?php

namespace Zfegg\Admin\V1\Rpc\Suggestion;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;


/**
 * Class SuggestionController
 * @package Zfegg\Admin\V1\Rpc\Suggestion
 * @author Xiemaomao
 * @version $Id$
 *
 * @method \Zend\Http\PhpEnvironment\Request getRequest()
 */
class SuggestionController extends AbstractActionController
{

    protected $users;

    public function __construct(TableGateway $table)
    {
        $this->users = $table;
    }

    public function suggestionAction()
    {
        $results = [];
        if ($query = $this->getRequest()->getQuery('q')) {
            $results = $this->users->select(function (Select $select) use ($query) {
                $select->columns(['user_id', 'username', 'real_name', 'email']);
                $select->where->like('username', '%' . $query . '%');
                $select->where->or;
                $select->where->like('real_name', '%' . $query . '%');
                $select->where->or;
                $select->where->like('email', '%' . $query . '%');
            });
        }

        return new JsonModel($results);
    }
}
