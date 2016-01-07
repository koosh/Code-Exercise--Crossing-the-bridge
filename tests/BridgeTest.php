<?php

class BridgeTest extends \PHPUnit_Framework_TestCase
{
    public function testMinimalCrossing()
    {
        $people = array(
            new Person(20),
            new Person(1),
        );

        $bridge = new Bridge(1, 2);

        $this->assertEquals(20, $bridge->getTimeToPass($people));
    }

    public  function testAverageCrossing()
    {
        $people = array(
            new Person(20),
            new Person(30),
            new Person(50),
            new Person(10),
            new Person(1),
        );

        $bridge = new Bridge(1, 2);

        $this->assertEquals(113, $bridge->getTimeToPass($people));
    }

    public function testWiderMinimalCrossing()
    {
        $people = array(
            new Person(30),
            new Person(20),
            new Person(1),
        );

        $bridge = new Bridge(1, 3);

        $this->assertEquals(30, $bridge->getTimeToPass($people));
    }

    public  function testWiderAverageCrossing()
    {
        $people = array(
            new Person(20),
            new Person(30),
            new Person(50),
            new Person(10),
            new Person(1),
        );

        $bridge = new Bridge(1, 3);

        $this->assertEquals(71, $bridge->getTimeToPass($people));
    }
}

