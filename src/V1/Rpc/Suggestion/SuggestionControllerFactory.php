<?php

namespace Zfegg\Admin\V1\Rpc\Suggestion;

use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class SuggestionControllerFactory
 * @package Zfegg\Admin\V1\Rpc\Suggestion
 * @author Xiemaomao
 * @version $Id$
 */
class SuggestionControllerFactory
{

    public function __invoke(ServiceLocatorInterface $sl)
    {
        if (method_exists($sl, 'getServiceLocator')) {
            $sl = $sl->getServiceLocator();
        }

        return new SuggestionController($sl->get('Zfegg\\Admin\\V1\\Rest\\AdminUser\\AdminUserResource\\Table'));
    }
}