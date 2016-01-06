<?php
namespace Zfegg\Admin\V1\Rpc\App;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AppController extends AbstractActionController
{
    public function appAction()
    {
        $configs = $this->getServiceLocator()->get('config')['zfegg-admin'];
        $viewModel = new ViewModel([
            'modules' => $configs['ui_modules'],
            'uiConfigs' => $configs['ui_configs']
        ]);
        $viewModel->setTemplate('zfegg-admin-ui');
        $viewModel->setTerminal(true);

        return $viewModel;
    }
}
