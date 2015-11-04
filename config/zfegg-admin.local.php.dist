<?php
return array(
    'db' => array(
        'adapters' => array(
            'Db\ZfeggAdmin' => array(
                'database' => 'zfegg-admin',
                'driver' => 'PDO_Mysql',
                'hostname' => '',
                'username' => 'root',
                'password' => 'ztgame@123',
                'dsn' => 'mysql:dbname=zfegg-admin;host=192.168.39.18;charset=utf8',
            ),
        ),
    ),

    'zf-mvc-auth' => array(
        'authentication' => array(
            'adapters' => array(
                'users' => array(
                    'adapter' => 'ZF\\MvcAuth\\Authentication\\OAuth2Adapter',
                    'storage' => array(
                        'adapter' => 'pdo',
                        'dsn' => 'mysql:dbname=zfegg-admin;host=192.168.39.18;charset=utf8',
                        'route' => '/oauth',
                        'username' => 'root',
                        'password' => 'ztgame@123',
                        'storage_settings' => array(
                            'auth_code_lifetime' => '2800',
                            'user_table' => 'admin_users',
                        ),
                    ),
                ),
            ),
        ),
    ),

    'zfegg-admin' => array(
        'mvc-auth' => array(
            'role_whitelists' => array(
                '6' => array(
                    '*' => array(),
                ),
            ),
        ),
    ),
);