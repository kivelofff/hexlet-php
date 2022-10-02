<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Acl\{
    Acl,
    AccessDenied,
    ResourceUndefined,
    PrivilegeUndefined
};

// phpcs:disable
require_once 'src/App/Acl/AccessDenied.php';
require_once 'src/App/Acl/ResourceUndefined.php';
require_once 'src/App/Acl/PrivilegeUndefined.php';
// phpcs:enable

class SolutionTest extends TestCase
{
    private static $data = [
        'articles' => [
            'show' => ['editor', 'manager'],
            'edit' => ['editor']
        ],
        'money' => [
            'create' => ['editor'],
            'show' => ['editor', 'manager'],
            'edit' => ['manager'],
            'remove' => ['manager']
        ]
    ];

    public function testAccessDenied()
    {
        $acl = new Acl(static::$data);

        // BEGIN (write your solution here)

        // END
    }

    // BEGIN (write your solution here)

    // END
}

