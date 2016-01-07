<?php
namespace Zfegg\Admin\V1\Rpc\App;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AppController extends AbstractActionController
{
    public function appAction()
    {
        $configs = $this->getServiceLocator()->get('config')['zfegg-admin']['ui'];
        $viewModel = new ViewModel(['configs' => $configs]);
        $viewModel->setTemplate('zfegg-admin-ui');
        $viewModel->setTerminal(true);

        return $viewModel;
    }
}
