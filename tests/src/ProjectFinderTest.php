<?php

namespace Task\Cli;

class ProjectFinderTest extends \PHPUnit_Framework_TestCase
{
    public function testFind()
    {
        $dir = dirname(__DIR__) . '/fixtures/valid-taskfile';
        
        $taskfile = $dir . '/Taskfile';
        
        $expected = require $taskfile;
        
        $actual = (new ProjectFinder($dir))->find();
        
        $this->assertEquals($expected, $actual);
    }

    /**
     * @expectedException RuntimeException
     */
    public function testFindThrowsOnNoTaskFile()
    {
        $dir = dirname(__DIR__) . '/fixtures/no-taskfile';
        
        (new ProjectFinder($dir))->find();
    }

    /**
     * @expectedException UnexpectedValueException
     */
    public function testFindThrowsOnNotProject()
    {
        $dir = dirname(__DIR__) . '/fixtures/invalid-taskfile';
        
        (new ProjectFinder($dir))->find();
    }
}
