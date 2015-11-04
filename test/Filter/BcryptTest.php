<?php

namespace ZfeggTest\Admin\Filter;

use Zfegg\Admin\Filter\Bcrypt as ZfeggAdminBcryptFilter;

class BcryptTest extends \PHPUnit_Framework_TestCase
{
    public function testBcryptFilter()
    {
        $filter = new ZfeggAdminBcryptFilter();

        $password1 = $filter->filter('111111');
        $this->assertTrue($filter->getbcrypt()->verify('111111', $password1));

        $password2 = $filter->filter('$2y$10$iJDDLU9pezLQ5WeVk8wN4OxgHBng7bktTnErxfSpIQZQVlBU4eb/O');
        $this->assertTrue($filter->getbcrypt()->verify('111111', $password2));
    }
}
