<?php

require "hello-world.php";

class HelloWorldTest extends PHPUnit_Framework_TestCase
{
    public function testHelloWorld()
    {
        $this->assertEquals('Hello, World!', helloWorld());
    }
}
