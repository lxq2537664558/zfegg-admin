<?php
namespace Zfegg\Admin\V1\Rpc\Profile;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\InjectApplicationEventInterface;
use Zend\View\Model\JsonModel;

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
    protected $userResource;

    public function __construct($userResource)
    {
        $this->userResource = $userResource;
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

        return new JsonModel($entity);
    }
}