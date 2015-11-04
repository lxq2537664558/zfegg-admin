<?php
use Zend\Http\ClientStatic;
use Zend\Json\Json;

include __DIR__ . '/../../../vendor/autoload.php';


$test = new Test2;

$test->testGetProfile();

class Test2
{
    const HOST = 'http://localhost/zfegg-admin';
    
    public function testGetProfile()
    {
        /*
         * GET /oauth/resource HTTP/1.1
        Accept: application/json
        Authorization: Bearer 907c762e069589c2cd2a229cdae7b8778caa9f07
         */
        $response = ClientStatic::get(self::HOST . '/profile', [],
            [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer 9c42215c4e2b176281a16fae909a49fa77bf85a2',
            ]
        );

        echo Json::prettyPrint($response->getBody());
    }

    public function testPostLogin()
    {

        $response = ClientStatic::post(self::HOST . '/login',
            [
                'username' => 'abc',
                'password' => 'abc',
                'captcha' => 'abc',
            ],
            [
                'Accept' => 'application/json',
//                'Content-Type' => 'application/json',
            ]
//            ,
//            [
//                'username' => 'abc',
//            ]
        );

        echo Json::prettyPrint($response->getBody());
    }

    public function testGetOauthResource()
    {
/*
 * GET /oauth/resource HTTP/1.1
Accept: application/json
Authorization: Bearer 907c762e069589c2cd2a229cdae7b8778caa9f07
 */
        $response = ClientStatic::get(self::HOST . '/oauth/resource',
            [],
            [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer 9c42215c4e2b176281a16fae909a49fa77bf85a2',
            ]
        );

        echo Json::prettyPrint($response->getBody());
    }

    public function testGetRoleResources()
    {
        $response = ClientStatic::get(self::HOST . '/roles/1/resources', [],
            [
                'Accept' => 'application/hal+json',
            ]
        );

        echo Json::prettyPrint($response->getBody());
    }

    public function testGetResources()
    {

        $response = ClientStatic::get(self::HOST . '/resources', [],
            [
                'Accept' => 'application/hal+json',
            ]
        );

        echo Json::prettyPrint($response->getBody());
    }
}

