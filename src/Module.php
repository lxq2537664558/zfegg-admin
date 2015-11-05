<?php
namespace Zfegg\Admin;

use Zend\Mvc\MvcEvent;
use ZF\Apigility\Provider\ApigilityProviderInterface;

class Module implements ApigilityProviderInterface
{

    public function getConfig()
    {
        $configs = include __DIR__ . '/../config/module.config.php';
        $configs['zfegg-admin']['resources-documentation'] = include __DIR__ . '/../config/documentation.config.php';

        return $configs;
    }

    public function getAutoloaderConfig()
    {
        return [
            'ZF\Apigility\Autoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__,
                ],
            ],
        ];
    }
}
