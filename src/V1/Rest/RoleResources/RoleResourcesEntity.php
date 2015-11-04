<?php
namespace Zfegg\Admin\V1\Rest\RoleResources;

class RoleResourcesEntity extends \ArrayObject
{
    public function exchangeArray($input)
    {
        $input['methods'] = explode(',', $input['methods']);

        return parent::exchangeArray($input);
    }
}
