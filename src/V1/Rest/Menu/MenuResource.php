<?php
namespace Zfegg\Admin\V1\Rest\Menu;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class MenuResource extends AbstractResourceListener
{
    protected $menus;

    /**
     * @return mixed
     */
    public function getMenus()
    {
        return $this->menus;
    }

    /**
     * @param mixed $menus
     * @return $this
     */
    public function setMenus($menus)
    {
        $this->menus = $menus;
        return $this;
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        return array_values($this->getMenus());
    }
}
