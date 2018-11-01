<?php
namespace Zfegg\Admin\V1\Rpc\Profile;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\InjectApplicationEventInterface;
use Zend\View\Model\JsonModel;
use ZF\Apigility\DbConnectedResource;
use Zfegg\Admin\V1\Rest\UserRoles\UserRolesResource;

/**
 * Class ProfileController
 *
 * @method \ZF\MvcAuth\Identity\AuthenticatedIdentity getIdentity()
 * @method \Zend\InputFilter\InputFilter getInputFilter()
 * @method \Zend\Http\PhpEnvironment\Request getRequest()
 */
class ProfileController extends AbstractActionController implements InjectApplicationEventInterface
{
    /** @var  \ZF\Apigility\DbConnectedResource */
    private $userResource;

    private $roleResources;
    private $userRoles;
    private $menus;

    public function __construct(
        DbConnectedResource $userResource,
        UserRolesResource $userRoles,
        TableGateway $roleResources,
        array $menus
    )
    {
        $this->userResource = $userResource;
        $this->userRoles = $userRoles;
        $this->roleResources = $roleResources;
        $this->menus = $menus;
    }

    public function indexAction()
    {
        if ($this->getRequest()->isPut()) {
            $inputFilter = $this->getInputFilter();
            $data = array_filter($inputFilter->getValues());

            return new JsonModel($this->userResource->patch($this->getIdentity()->getName(), $data));
        }

        /** @var \Zfegg\Admin\V1\Rest\AdminUser\AdminUserEntity $entity */
        $entity = $this->userResource->fetch($this->getIdentity()->getName());

        $this->userRoles->setUserId($entity['user_id']);

        $roles = $this->userRoles->fetchAll()->toArray();
        $entity['roles'] = $roles;
        $permissions = [];

//        foreach ($roles as $role) {
//            foreach ($this->roleResources->select(['role_id' => $role['role_id']]) as $item) {
//                foreach ($item['methods'] as $method) {
//                    $permissions[] = $item['resource'] . '@' . $method;
//                }
//            }
//        }

        foreach ($roles as $role) {
            $permissions = array_merge(
                $permissions,
                $this->roleResources->select(function (Select $select) use ($role) {
                    $select->columns(['resource', 'methods', 'id']);
                    $select->where(['role_id' => $role['role_id']]);
                })->toArray()
            );
        }

        $entity['permissions'] = $permissions;

//        $entity['menus'] = self::filterMenusRecursive($this->menus, $permissions);

        unset($entity['password']);

        return new JsonModel($entity);
    }

    private static function filterMenusRecursive(array $menus, array $permissions)
    {
        $outMenus = [];

        foreach ($menus as $menu) {
            if (!empty($menu['children'])) {
                $menu['children'] = self::filterMenusRecursive($menu['children'], $permissions);
            }

            if (!empty($menu['base_permissions'])) {
                $allowPermissions = array_intersect($menu['base_permissions'], $permissions);
                if (count($allowPermissions) == count($menu['base_permissions'])) {
                    $outMenus[] = $menu;
                }
            } elseif (! empty($menu['children'])) {
                $outMenus[] = $menu;
            }
        }

        return $outMenus;
    }
}