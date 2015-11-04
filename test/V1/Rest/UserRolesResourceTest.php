<?php


namespace ZfeggTest\Admin\V1\Rest;

use Zend\Db\ResultSet\ResultSet;
use Zend\EventManager\EventManager;
use Zend\Mvc\Router\Http\RouteMatch;
use Zend\ServiceManager\Config;
use Zend\ServiceManager\ServiceManager;
use Zend\Stdlib\ArrayUtils;
use Zend\Stdlib\Parameters;
use ZF\Rest\Resource;
use ZF\Rest\ResourceEvent;
use Zfegg\Admin\V1\Rest\UserRoles\UserRolesResourceFactory;

class UserRolesResourceTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Resource */
    protected $resource;

    /** @var  \ZF\Rest\AbstractResourceListener */
    protected $listener;

    protected function getServices()
    {
        $configs = include __DIR__ . '/../../../config/module.config.php';
        $configs = ArrayUtils::merge($configs, include __DIR__ . '/../../../config/zfegg-admin.local.php.dist');
        $configs = ArrayUtils::merge($configs, $this->getConfigs());

        $serviceConfig = new Config($configs['service_manager']);
        $services = new ServiceManager($serviceConfig);
        $services->setService('config', $configs);

        return $services;
    }

    protected function getConfigs()
    {
        return [
            'service_manager' => [
                'invokables' => [
                    'ZF\Apigility\MvcAuth\UnauthenticatedListener' => 'ZF\Apigility\MvcAuth\UnauthenticatedListener',
                    'ZF\Apigility\MvcAuth\UnauthorizedListener' => 'ZF\Apigility\MvcAuth\UnauthorizedListener',
                ],
                'abstract_factories' => [
                    'Zend\Db\Adapter\AdapterAbstractServiceFactory', // so that db-connected works "out-of-the-box"
                    'ZF\Apigility\DbConnectedResourceAbstractFactory',
                    'ZF\Apigility\TableGatewayAbstractFactory',
                ],
            ],
        ];
    }

    public function setUp()
    {
        $resourceFactory = new UserRolesResourceFactory();

        /** @var \Zfegg\Admin\V1\Rest\UserRoles\UserRolesResource $resources */
        $resources = $resourceFactory($this->getServices());

        $events = new EventManager();

        $this->listener = $resources;
        $events->attach($this->listener);
    }

    /**
     * @group 7
     */
    public function testDispatchEvent()
    {
        $queryParams = new Parameters(['foo' => 'bar']);
        $event = new ResourceEvent();
        $event->setName('fetchAll');
        $event->setQueryParams($queryParams);
//        $event->setParam('user_id', 1);
        $event->setRouteMatch(new RouteMatch(['user_id' => 1]));

        $result = $this->listener->dispatch($event);

        $this->assertInstanceOf(ResultSet::class, $result);
    }
}
