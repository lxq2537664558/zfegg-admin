<?php
namespace Zfegg\Admin\V1\Rpc\App;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AppController extends AbstractActionController
{
    protected $uiConfigs;

    public function __construct($uiConfigs = [])
    {
        $this->uiConfigs = $uiConfigs;
    }

    public function appAction()
    {
        $configs = $this->uiConfigs;
        $viewModel = new ViewModel(['configs' => $configs]);
        $viewModel->setTemplate('zfegg-admin-ui');
        $viewModel->setTerminal(true);

        return $viewModel;
    }
}
