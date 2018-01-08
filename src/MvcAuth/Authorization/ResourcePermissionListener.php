<?php

namespace Zfegg\Admin\MvcAuth\Authorization;

use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;
use ZF\MvcAuth\Identity\GuestIdentity;
use ZF\MvcAuth\Identity\IdentityInterface;
use ZF\MvcAuth\MvcAuthEvent;

class ResourcePermissionListener extends AbstractListenerAggregate
{
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events->attach(MvcAuthEvent::EVENT_AUTHORIZATION, [$this, 'authorization'], 100);
    }

    public function authorization(MvcAuthEvent $event)
    {

        /** @var \ZF\MvcAuth\Identity\AuthenticatedIdentity $identity */
        $identity = $event->getIdentity();
        if (!$identity instanceof IdentityInterface || $identity instanceof GuestIdentity) {
            return;
        }

        $method = $event->getMvcEvent()->getRequest()->getMethod();

        /** @var \ZF\MvcAuth\Authorization\AclAuthorization $authorization */
        $authorization = $event->getAuthorizationService();

        $sl = $event->getMvcEvent()->getApplication()->getServiceManager();

        /** @var \Zend\Permissions\Acl\Assertion\AssertionInterface $resourceAssertion */
        $resourceAssertion = $sl->get('Zfegg\Admin\MvcAuth\Authorization\ResourceAssertion');

        if (!$authorization->hasRole($identity)) {
            $authorization->addRole($identity);
        }

        if (!$authorization->hasResource($event->getResource())) {
            $authorization->addResource($event->getResource());
        }

        $authorization->deny($identity, $event->getResource(), $method, $resourceAssertion);
    }
}
