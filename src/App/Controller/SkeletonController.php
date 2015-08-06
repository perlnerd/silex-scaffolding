<?php
namespace App\Controller;

class SkeletonController
{
    private $env;

    public function getEnv()
    {
        return $this->env;
    }

    public function setEnv($env)
    {
        $this->env = $env;

        return $this;
    }

    public function __construct($env)
    {
        $this->setEnv($env);
    }

    public function greetAction($name)
    {
        $greeting = sprintf("Greetings %s!  We are in the %s environment", $name, $this->env);

        return $greeting;
    }
}
