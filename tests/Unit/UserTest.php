<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserClass()
    {
        $this->assertSame('1', '1');
    }

    public function testUserUserClass()
    {
        $this->assertSame('2', '2');
    }
}