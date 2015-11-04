<?php
return array(
    'zf-versioning' => array(
        'default_version' => 1,
        'uri' => array(
            3 => 'zfegg-admin.rest.resources',
            4 => 'zfegg-admin.rest.role-resources',
            5 => 'zfegg-admin.rest.user-roles',
            7 => 'zfegg-admin.rest.oauth-clients',
            9 => 'zfegg-admin.rpc.profile',
            0 => 'zfegg-admin.rest.admin-user',
            10 => 'zfegg-admin.rest.admin-role',
            11 => 'zfegg-admin.rpc.app',
        ),
    ),
    'router' => array(
        'routes' => array(
            'zfegg-admin.rest.resources' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/resources[/:resource]',
                    'defaults' => array(
                        'controller' => 'Zfegg\\Admin\\V1\\Rest\\Resources\\Controller',
                    ),
                ),
            ),
            'zfegg-admin.rest.role-resources' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/roles/:role_id/resources[/:resource]',
                    'defaults' => array(
                        'controller' => 'Zfegg\\Admin\\V1\\Rest\\RoleResources\\Controller',
                    ),
                ),
            ),
            'zfegg-admin.rest.user-roles' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/users/:user_id/roles[/:role_id]',
                    'defaults' => array(
                        'controller' => 'Zfegg\\Admin\\V1\\Rest\\UserRoles\\Controller',
                    ),
                ),
            ),
            'zfegg-admin.rest.oauth-clients' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/clients[/:client_id]',
                    'defaults' => array(
                        'controller' => 'Zfegg\\Admin\\V1\\Rest\\OauthClients\\Controller',
                    ),
                ),
            ),
            'zfegg-admin.rpc.profile' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/profile[/:action]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Zfegg\\Admin\\V1\\Rpc\\Profile\\Controller',
                        'action' => 'index',
                    ),
                ),
            ),
            'zfegg-admin.rest.admin-user' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/users[/:user_id]',
                    'defaults' => array(
                        'controller' => 'Zfegg\\Admin\\V1\\Rest\\AdminUser\\Controller',
                    ),
                ),
            ),
            'zfegg-admin.rest.admin-role' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/roles[/:role_id]',
                    'defaults' => array(
                        'controller' => 'Zfegg\\Admin\\V1\\Rest\\AdminRole\\Controller',
                    ),
                ),
            ),
            'zfegg-admin.rpc.app' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Zfegg\\Admin\\V1\\Rpc\\App\\Controller',
                        'action' => 'app',
                    ),
                ),
            ),
        ),
    ),
    'zf-rest' => array(
        'Zfegg\\Admin\\V1\\Rest\\Resources\\Controller' => array(
            'listener' => 'Zfegg\\Admin\\V1\\Rest\\Resources\\ResourcesResource',
            'route_name' => 'zfegg-admin.rest.resources',
            'route_identifier_name' => 'resource',
            'collection_name' => 'resources',
            'entity_http_methods' => array(
                0 => 'GET',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Zfegg\\Admin\\V1\\Rest\\Resources\\ResourcesEntity',
            'collection_class' => 'Zfegg\\Admin\\V1\\Rest\\Resources\\ResourcesCollection',
            'service_name' => 'Resources',
        ),
        'Zfegg\\Admin\\V1\\Rest\\RoleResources\\Controller' => array(
            'listener' => 'Zfegg\\Admin\\V1\\Rest\\RoleResources\\RoleResourcesResource',
            'route_name' => 'zfegg-admin.rest.role-resources',
            'route_identifier_name' => 'resource',
            'collection_name' => 'role_resources',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'DELETE',
                2 => 'PUT',
                3 => 'PATCH',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
                2 => 'DELETE',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Zfegg\\Admin\\V1\\Rest\\RoleResources\\RoleResourcesEntity',
            'collection_class' => 'Zfegg\\Admin\\V1\\Rest\\RoleResources\\RoleResourcesCollection',
            'service_name' => 'RoleResources',
        ),
        'Zfegg\\Admin\\V1\\Rest\\UserRoles\\Controller' => array(
            'listener' => 'Zfegg\\Admin\\V1\\Rest\\UserRoles\\UserRolesResource',
            'route_name' => 'zfegg-admin.rest.user-roles',
            'route_identifier_name' => 'role_id',
            'collection_name' => 'user_roles',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
                2 => 'DELETE',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Zfegg\\Admin\\V1\\Rest\\UserRoles\\UserRolesEntity',
            'collection_class' => 'Zfegg\\Admin\\V1\\Rest\\UserRoles\\UserRolesCollection',
            'service_name' => 'UserRoles',
        ),
        'Zfegg\\Admin\\V1\\Rest\\OauthClients\\Controller' => array(
            'listener' => 'Zfegg\\Admin\\V1\\Rest\\OauthClients\\OauthClientsResource',
            'route_name' => 'zfegg-admin.rest.oauth-clients',
            'route_identifier_name' => 'client_id',
            'collection_name' => 'oauth_clients',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Zfegg\\Admin\\V1\\Rest\\OauthClients\\OauthClientsEntity',
            'collection_class' => 'Zfegg\\Admin\\V1\\Rest\\OauthClients\\OauthClientsCollection',
            'service_name' => 'oauth_clients',
        ),
        'Zfegg\\Admin\\V1\\Rest\\AdminUser\\Controller' => array(
            'listener' => 'Zfegg\\Admin\\V1\\Rest\\AdminUser\\AdminUserResource',
            'route_name' => 'zfegg-admin.rest.admin-user',
            'route_identifier_name' => 'user_id',
            'collection_name' => 'admin_users',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Zfegg\\Admin\\V1\\Rest\\AdminUser\\AdminUserEntity',
            'collection_class' => 'Zfegg\\Admin\\V1\\Rest\\AdminUser\\AdminUserCollection',
            'service_name' => 'admin_users',
        ),
        'Zfegg\\Admin\\V1\\Rest\\AdminRole\\Controller' => array(
            'listener' => 'Zfegg\\Admin\\V1\\Rest\\AdminRole\\AdminRoleResource',
            'route_name' => 'zfegg-admin.rest.admin-role',
            'route_identifier_name' => 'role_id',
            'collection_name' => 'admin_roles',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Zfegg\\Admin\\V1\\Rest\\AdminRole\\AdminRoleEntity',
            'collection_class' => 'Zfegg\\Admin\\V1\\Rest\\AdminRole\\AdminRoleCollection',
            'service_name' => 'admin_roles',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Zfegg\\Admin\\V1\\Rest\\Resources\\Controller' => 'HalJson',
            'Zfegg\\Admin\\V1\\Rest\\RoleResources\\Controller' => 'HalJson',
            'Zfegg\\Admin\\V1\\Rest\\UserRoles\\Controller' => 'HalJson',
            'Zfegg\\Admin\\V1\\Rest\\OauthClients\\Controller' => 'HalJson',
            'Zfegg\\Admin\\V1\\Rpc\\Profile\\Controller' => 'Json',
            'Zfegg\\Admin\\V1\\Rest\\AdminUser\\Controller' => 'HalJson',
            'Zfegg\\Admin\\V1\\Rest\\AdminRole\\Controller' => 'HalJson',
            'Zfegg\\Admin\\V1\\Rpc\\App\\Controller' => 'Json',
        ),
        'accept_whitelist' => array(
            'Zfegg\\Admin\\V1\\Rest\\Resources\\Controller' => array(
                0 => 'application/vnd.zfegg-admin.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Zfegg\\Admin\\V1\\Rest\\RoleResources\\Controller' => array(
                0 => 'application/vnd.zfegg-admin.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Zfegg\\Admin\\V1\\Rest\\UserRoles\\Controller' => array(
                0 => 'application/vnd.zfegg-admin.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Zfegg\\Admin\\V1\\Rest\\OauthClients\\Controller' => array(
                0 => 'application/vnd.zfegg-admin.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Zfegg\\Admin\\V1\\Rpc\\Profile\\Controller' => array(
                0 => 'application/vnd.zfegg-admin.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
                3 => 'application/x-www-form-urlencoded',
            ),
            'Zfegg\\Admin\\V1\\Rest\\AdminUser\\Controller' => array(
                0 => 'application/vnd.zfegg-admin.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Zfegg\\Admin\\V1\\Rest\\AdminRole\\Controller' => array(
                0 => 'application/vnd.zfegg-admin.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Zfegg\\Admin\\V1\\Rpc\\App\\Controller' => array(
                0 => 'text/html',
                1 => 'application/xhtml+xml',
                2 => 'application/xml',
            ),
        ),
        'content_type_whitelist' => array(
            'Zfegg\\Admin\\V1\\Rest\\Resources\\Controller' => array(
                0 => 'application/vnd.zfegg-admin.v1+json',
                1 => 'application/json',
            ),
            'Zfegg\\Admin\\V1\\Rest\\RoleResources\\Controller' => array(
                0 => 'application/vnd.zfegg-admin.v1+json',
                1 => 'application/json',
            ),
            'Zfegg\\Admin\\V1\\Rest\\UserRoles\\Controller' => array(
                0 => 'application/vnd.zfegg-admin.v1+json',
                1 => 'application/json',
            ),
            'Zfegg\\Admin\\V1\\Rest\\OauthClients\\Controller' => array(
                0 => 'application/vnd.zfegg-admin.v1+json',
                1 => 'application/json',
            ),
            'Zfegg\\Admin\\V1\\Rpc\\Profile\\Controller' => array(
                0 => 'application/vnd.zfegg-admin.v1+json',
                1 => 'application/json',
                2 => 'application/x-www-form-urlencoded',
            ),
            'Zfegg\\Admin\\V1\\Rest\\AdminUser\\Controller' => array(
                0 => 'application/vnd.zfegg-admin.v1+json',
                1 => 'application/json',
            ),
            'Zfegg\\Admin\\V1\\Rest\\AdminRole\\Controller' => array(
                0 => 'application/vnd.zfegg-admin.v1+json',
                1 => 'application/json',
            ),
            'Zfegg\\Admin\\V1\\Rpc\\App\\Controller' => array(
                0 => 'application/vnd.zfegg-admin.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Zfegg\\Admin\\V1\\Rest\\Resources\\ResourcesEntity' => array(
                'entity_identifier_name' => 'resource',
                'route_name' => 'zfegg-admin.rest.resources',
                'route_identifier_name' => 'resource',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'Zfegg\\Admin\\V1\\Rest\\Resources\\ResourcesCollection' => array(
                'entity_identifier_name' => 'resource',
                'route_name' => 'zfegg-admin.rest.resources',
                'route_identifier_name' => 'resource',
                'is_collection' => true,
            ),
            'Zfegg\\Admin\\V1\\Rest\\RoleResources\\RoleResourcesEntity' => array(
                'entity_identifier_name' => 'resource',
                'route_name' => 'zfegg-admin.rest.role-resources',
                'route_identifier_name' => 'resource',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'Zfegg\\Admin\\V1\\Rest\\RoleResources\\RoleResourcesCollection' => array(
                'entity_identifier_name' => 'resource',
                'route_name' => 'zfegg-admin.rest.role-resources',
                'route_identifier_name' => 'resource',
                'is_collection' => true,
            ),
            'Zfegg\\Admin\\V1\\Rest\\UserRoles\\UserRolesEntity' => array(
                'entity_identifier_name' => 'role_id',
                'route_name' => 'zfegg-admin.rest.user-roles',
                'route_identifier_name' => 'role_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'Zfegg\\Admin\\V1\\Rest\\UserRoles\\UserRolesCollection' => array(
                'entity_identifier_name' => 'role_id',
                'route_name' => 'zfegg-admin.rest.user-roles',
                'route_identifier_name' => 'role_id',
                'is_collection' => true,
            ),
            'Zfegg\\Admin\\V1\\Rest\\OauthClients\\OauthClientsEntity' => array(
                'entity_identifier_name' => 'client_id',
                'route_name' => 'zfegg-admin.rest.oauth-clients',
                'route_identifier_name' => 'client_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'Zfegg\\Admin\\V1\\Rest\\OauthClients\\OauthClientsCollection' => array(
                'entity_identifier_name' => 'client_id',
                'route_name' => 'zfegg-admin.rest.oauth-clients',
                'route_identifier_name' => 'client_id',
                'is_collection' => true,
            ),
            'Zfegg\\Admin\\V1\\Rest\\AdminUser\\AdminUserEntity' => array(
                'entity_identifier_name' => 'user_id',
                'route_name' => 'zfegg-admin.rest.admin-user',
                'route_identifier_name' => 'user_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'Zfegg\\Admin\\V1\\Rest\\AdminUser\\AdminUserCollection' => array(
                'entity_identifier_name' => 'user_id',
                'route_name' => 'zfegg-admin.rest.admin-user',
                'route_identifier_name' => 'user_id',
                'is_collection' => true,
            ),
            'Zfegg\\Admin\\V1\\Rest\\AdminRole\\AdminRoleEntity' => array(
                'entity_identifier_name' => 'role_id',
                'route_name' => 'zfegg-admin.rest.admin-role',
                'route_identifier_name' => 'role_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'Zfegg\\Admin\\V1\\Rest\\AdminRole\\AdminRoleCollection' => array(
                'entity_identifier_name' => 'role_id',
                'route_name' => 'zfegg-admin.rest.admin-role',
                'route_identifier_name' => 'role_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-apigility' => array(
        'db-connected' => array(
            'Zfegg\\Admin\\V1\\Rest\\OauthClients\\OauthClientsResource' => array(
                'adapter_name' => 'ZfeggOauth',
                'table_name' => 'oauth_clients',
                'hydrator_name' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
                'controller_service_name' => 'Zfegg\\Admin\\V1\\Rest\\OauthClients\\Controller',
                'entity_identifier_name' => 'client_id',
                'table_service' => 'Zfegg\\Admin\\V1\\Rest\\OauthClients\\OauthClientsResource\\Table',
            ),
            'Zfegg\\Admin\\V1\\Rest\\AdminUser\\AdminUserResource' => array(
                'adapter_name' => 'Db\\ZfeggAdmin',
                'table_name' => 'admin_users',
                'hydrator_name' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
                'controller_service_name' => 'Zfegg\\Admin\\V1\\Rest\\AdminUser\\Controller',
                'entity_identifier_name' => 'user_id',
                'table_service' => 'Zfegg\\Admin\\V1\\Rest\\AdminUser\\AdminUserResource\\Table',
            ),
            'Zfegg\\Admin\\V1\\Rest\\AdminRole\\AdminRoleResource' => array(
                'adapter_name' => 'Db\\ZfeggAdmin',
                'table_name' => 'admin_roles',
                'hydrator_name' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
                'controller_service_name' => 'Zfegg\\Admin\\V1\\Rest\\AdminRole\\Controller',
                'entity_identifier_name' => 'role_id',
                'table_service' => 'Zfegg\\Admin\\V1\\Rest\\AdminRole\\AdminRoleResource\\Table',
            ),
        ),
    ),
    'zf-content-validation' => array(
        'Zfegg\\Admin\\V1\\Rest\\Resources\\Controller' => array(
            'input_filter' => 'Zfegg\\Admin\\V1\\Rest\\Resources\\Validator',
        ),
        'Zfegg\\Admin\\V1\\Rest\\RoleResources\\Controller' => array(
            'input_filter' => 'Zfegg\\Admin\\V1\\Rest\\RoleResources\\Validator',
        ),
        'Zfegg\\Admin\\V1\\Rest\\UserRoles\\Controller' => array(
            'input_filter' => 'Zfegg\\Admin\\V1\\Rest\\UserRoles\\Validator',
        ),
        'Zfegg\\Admin\\V1\\Rest\\OauthClients\\Controller' => array(
            'input_filter' => 'Zfegg\\Admin\\V1\\Rest\\OauthClients\\Validator',
        ),
        'Zfegg\\Admin\\V1\\Rest\\AdminUser\\Controller' => array(
            'input_filter' => 'Zfegg\\Admin\\V1\\Rest\\AdminUser\\Validator',
        ),
        'Zfegg\\Admin\\V1\\Rest\\AdminRole\\Controller' => array(
            'input_filter' => 'Zfegg\\Admin\\V1\\Rest\\AdminRole\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Zfegg\\Admin\\V1\\Rest\\AdminUser\\Validator' => array(
            0 => array(
                'name' => 'account',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'ZF\\ContentValidation\\Validator\\DbNoRecordExists',
                        'options' => array(
                            'adapter' => 'Db\\ZfeggAdmin',
                            'table' => 'admin_users',
                            'field' => 'account',
                        ),
                    ),
                    1 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '255',
                        ),
                    ),
                ),
            ),
            1 => array(
                'name' => 'password',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                    2 => array(
                        'name' => 'Zfegg\\Admin\\Filter\\Bcrypt',
                        'options' => array(),
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '255',
                        ),
                    ),
                ),
            ),
            2 => array(
                'name' => 'real_name',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '255',
                        ),
                    ),
                ),
            ),
            3 => array(
                'name' => 'email',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '255',
                        ),
                    ),
                    1 => array(
                        'name' => 'Zend\\Validator\\EmailAddress',
                        'options' => array(),
                    ),
                ),
            ),
            4 => array(
                'name' => 'status',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\Digits',
                    ),
                ),
                'validators' => array(),
            ),
            5 => array(
                'name' => 'create_time',
                'required' => false,
                'filters' => array(),
                'validators' => array(),
            ),
        ),
        'Zfegg\\Admin\\V1\\Rest\\AdminRole\\Validator' => array(
            0 => array(
                'name' => 'name',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'ZF\\ContentValidation\\Validator\\DbNoRecordExists',
                        'options' => array(
                            'adapter' => 'Db\\ZfeggAdmin',
                            'table' => 'admin_roles',
                            'field' => 'name',
                        ),
                    ),
                    1 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '30',
                        ),
                    ),
                ),
            ),
            1 => array(
                'name' => 'parent_id',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\Digits',
                    ),
                ),
                'validators' => array(),
            ),
        ),
        'Zfegg\\Admin\\V1\\Rest\\Resources\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'resource',
            ),
            1 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'methods',
            ),
        ),
        'Zfegg\\Admin\\V1\\Rest\\RoleResources\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'resource',
            ),
            1 => array(
                'required' => true,
                'type' => 'Zend\\InputFilter\\ArrayInput',
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\InArray',
                        'options' => array(
                            'haystack' => array(
                                0 => 'GET',
                                1 => 'POST',
                                2 => 'PUT',
                                3 => 'PATCH',
                                4 => 'DELETE',
                            ),
                        ),
                    ),
                ),
                'filters' => array(
                    0 => array(
                        'name' => 'StringToUpper',
                    ),
                ),
                'name' => 'methods',
                'description' => '权限',
            ),
        ),
        'Zfegg\\Admin\\V1\\Rest\\UserRoles\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\ToInt',
                        'options' => array(),
                    ),
                ),
                'name' => 'role_id',
            ),
            1 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'name',
            ),
            2 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\ToInt',
                        'options' => array(),
                    ),
                ),
                'name' => 'parent',
            ),
        ),
        'Zfegg\\Admin\\V1\\Rest\\OauthClients\\Validator' => array(
            0 => array(
                'name' => 'client_secret',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                    2 => array(
                        'name' => 'Zfegg\\Admin\\Filter\\Bcrypt',
                        'options' => array(),
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '80',
                        ),
                    ),
                ),
            ),
            1 => array(
                'name' => 'redirect_uri',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '2000',
                        ),
                    ),
                ),
            ),
            2 => array(
                'name' => 'grant_types',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '80',
                        ),
                    ),
                ),
            ),
            3 => array(
                'name' => 'scope',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '2000',
                        ),
                    ),
                ),
            ),
            4 => array(
                'name' => 'user_id',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '255',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'Zfegg\\Admin\\V1\\Rest\\Resources\\Controller' => array(
                'collection' => array(
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
                'entity' => array(
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
            ),
            'Zfegg\\Admin\\V1\\Rest\\RoleResources\\Controller' => array(
                'collection' => array(
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
                'entity' => array(
                    'GET' => false,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
            ),
            'Zfegg\\Admin\\V1\\Rest\\UserRoles\\Controller' => array(
                'collection' => array(
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
                'entity' => array(
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
            ),
            'Zfegg\\Admin\\V1\\Rpc\\Profile\\Controller' => array(
                'actions' => array(
                    'profile' => array(
                        'GET' => true,
                        'POST' => true,
                        'PUT' => true,
                        'PATCH' => false,
                        'DELETE' => false,
                    ),
                ),
            ),
            'Zfegg\\Admin\\V1\\Rpc\\App\\Controller' => array(
                'actions' => array(
                    'App' => array(
                        'GET' => false,
                        'POST' => false,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ),
                ),
            ),
            'Zfegg\\Admin\\V1\\Rest\\AdminUser\\Controller' => array(
                'collection' => array(
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
                'entity' => array(
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Zfegg\\Admin\\V1\\Rest\\Resources\\ResourcesResource' => 'Zfegg\\Admin\\V1\\Rest\\Resources\\ResourcesResourceFactory',
            'Zfegg\\Admin\\V1\\Rest\\RoleResources\\RoleResourcesResource' => 'Zfegg\\Admin\\V1\\Rest\\RoleResources\\RoleResourcesResourceFactory',
            'Zfegg\\Admin\\V1\\Rest\\UserRoles\\UserRolesResource' => 'Zfegg\\Admin\\V1\\Rest\\UserRoles\\UserRolesResourceFactory',
        ),
        'invokables' => array(
            'Zfegg\\Admin\MvcAuth\Authorization\ResourceAssertion' => 'Zfegg\\Admin\MvcAuth\Authorization\ResourceAssertion',
            'Zfegg\\Admin\MvcAuth\Authorization\ResourcePermissionListener' => 'Zfegg\\Admin\MvcAuth\Authorization\ResourcePermissionListener',
        ),
    ),
    'zf-rpc' => array(
        'Zfegg\\Admin\\V1\\Rpc\\Profile\\Controller' => array(
            'service_name' => 'profile',
            'http_methods' => array(
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
            ),
            'route_name' => 'zfegg-admin.rpc.profile',
        ),
        'Zfegg\\Admin\\V1\\Rpc\\App\\Controller' => array(
            'service_name' => 'App',
            'http_methods' => array(
                0 => 'GET',
            ),
            'route_name' => 'zfegg-admin.rpc.app',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Zfegg\\Admin\\V1\\Rpc\\App\\Controller' => 'Zfegg\\Admin\\V1\\Rpc\\App\\AppController',
            'Zfegg\\Admin\\V1\\Rpc\\Profile\\Controller' => 'Zfegg\\Admin\\V1\\Rpc\\Profile\\ProfileController',
        ),
    ),
    'zfegg-admin' => array(
        'ui_modules' => array(),
        'menus' => array(
            0 => array(
                'text' => '系统',
                'index' => 0,
                'expanded' => true,
                'items' => array(
                    0 => array(
                        'text' => '用户管理',
                        'index' => 0,
                        'url' => '#/zfegg/admin/user',
                    ),
                    1 => array(
                        'text' => '角色管理',
                        'index' => 1,
                        'url' => '#/zfegg/admin/role',
                    ),
                    2 => array(
                        'text' => '权限列表',
                        'index' => 2,
                        'url' => '#/zfegg/admin/resource',
                    ),
                    3 => array(
                        'text' => '个人信息',
                        'index' => 4,
                        'url' => '#/zfegg/admin/profile',
                    ),
                ),
            ),
            1 => array(
                'text' => '模型管理',
                'expanded' => true,
                'items' => array(
                    0 => array(
                        'text' => '数据源添加',
                        'index' => 0,
                        'url' => '/model-manager/data-source-config/add',
                    ),
                    1 => array(
                        'text' => '数据源管理',
                        'index' => 0,
                        'url' => '/model-manager/data-source-config/index',
                    ),
                    2 => array(
                        'text' => '模型UI配置',
                        'index' => 1,
                        'url' => '/ui/model-manager/ui-config/index',
                    ),
                    3 => array(
                        'text' => '模型UI列表',
                        'index' => 1,
                        'url' => '/ui/model-manager/ui-config/list',
                    ),
                    4 => array(
                        'text' => '菜单配置',
                        'url' => '/model-manager/source/view/id/4',
                    ),
                    5 => array(
                        'text' => '数据源权限',
                        'url' => './model-manager/source/view/id/2',
                    ),
                ),
            ),
        ),
        'tables' => array(
            'user_roles' => 'admin_assign_user_roles',
            'role_resources' => 'admin_assign_role_resources',
            'roles' => 'admin_roles',
        ),

        'mvc-auth' => array(
            'role_whitelists' => array(
                '*' => array(
                    'Zfegg\\Admin\\V1\\Rpc\\Profile\\Controller::*' => array(),
                ),
            ),
        ),
    ),

    'listeners' => array(
        'Zfegg\\Admin\MvcAuth\Authorization\ResourcePermissionListener',
    ),
);
