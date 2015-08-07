<?php

namespace SilexSkeleton\Tests;

use App\Controller\SkeletonController;

class SkeletonControllerTest extends \PHPUnit_Framework_TestCase
{
    private $skel;

    public function setup()
    {
        $this->skel = new SkeletonController('test');

    }

    public function testEnv()
    {
        $env = $this->skel->getEnv();

        $this->assertContains('test', $env);
    }

    public function testGreet()
    {
        $result = $this->skel->greetAction('Tester');

        $this->assertContains('We are in the test environment', $result);
        $this->assertContains('Greetings Tester!', $result);
    }
}
