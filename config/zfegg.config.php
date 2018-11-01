<?php

use Zend\ServiceManager\Factory\InvokableFactory;
use Zfegg\Admin\Filter\Bcrypt;
use Zfegg\Admin\MvcAuth\Authorization\ResourcePermissionListener;

return [
    'tables'      => [
//        UserRolesResource::class . '\\Table' => [
//            'table' => 'admin_assign_user_roles',  //Table name
//            'row' => UserRolesEntity::class, //set custom ArrayObjectPrototype
//        ],
//        RoleResourcesResource::class . '\\Table' => [
//            'table' => 'admin_assign_role_resources',
//            'row' => RoleResourcesEntity::class,
//            'primary' => 'id',
//        ]
    ],
    'zfegg-admin' => [
        'ui'       => [
            'modules' => [],
            'oauth'   => [
                'clientId'     => null,
                'clientSecret' => null,
            ],
        ],
        'menus'    => [
            [
                'name'     => '系统',
                'path'     => '/system',
                'modules'  => ['admin'],
                'index'    => 0,
                'meta' => [
                ],
                'expanded' => true,
                'children'    => [
                    [
                        'name'             => '用户管理',
                        'index'            => 0,
                        'path'             => '/users',
                        'component'        => 'admin/UserList',
                        'base_permissions' => [
                            "Zfegg\Admin\V1\Rest\AdminUser\Controller::collection@POST",
                            "Zfegg\Admin\V1\Rest\AdminUser\Controller::collection@GET",
                            "Zfegg\Admin\V1\Rest\AdminUser\Controller::entity@POST",
                            "Zfegg\Admin\V1\Rest\AdminUser\Controller::entity@GET",
                        ],
                    ],
                    [
                        'name'   => '角色管理',
                        'index'  => 1,
                        'path'   => '/roles',
                        'component' => 'admin/Role',
                    ],
//                    [
//                        'name'  => '权限列表',
//                        'index' => 2,
//                        'path'   => '/zfegg/admin/resource',
//                    ],
                    [
                        'name'  => '个人信息',
                        'index' => 3,
                        'path'   => '/profile',
                        'component' => 'admin/ChangePassword'
                    ],
                ],
            ],
        ],
        'tables'   => [
//            'roles' => 'admin_roles',
        ],
        'mvc-auth' => [
            'role_whitelists' => [
                '*' => [
                    'Zfegg\\Admin\\V1\\Rpc\\Profile\\Controller::*' => [
                        0 => 'GET',
                        1 => 'PUT',
                    ],
                    'Zfegg\\Admin\\V1\\Rest\\Menu\\Controller::*'   => [
                        0 => 'GET',
                    ],
                ],
            ],
        ],
    ],

    'listeners' => [
        ResourcePermissionListener::class,
    ],
    'filters'   => [
        'factories' => [
            Bcrypt::class => InvokableFactory::class,
        ],
    ],
];