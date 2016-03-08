<?php

namespace Zfegg\Admin\Factory;


use Zfegg\Admin\MvcAuth\Authorization\ResourceAssertion;

class ResourceAssertionFactory
{

    public function __invoke($services)
    {
        $configs = $services->get('config')['zfegg-admin'];
        $assertion = new ResourceAssertion();
        $assertion->setDbAdapter($services->get('db-zfegg-admin'));
        $assertion->setTables($configs['tables']);
        $assertion->setRoleWhitelists($configs['mvc-auth']['role_whitelists']);

        return $assertion;
    }
}