<?php

namespace Task\Cli;

class ProjectFinderTest extends \PHPUnit_Framework_TestCase
{
    public function testFind()
    {
        $dir = dirname(__DIR__) . '/fixtures/valid-taskfile';
        
        chdir($dir);
        
        $taskfile = $dir . '/Taskfile';
        
        $expected = require $taskfile;
        
        $actual = (new ProjectFinder)->find();
        
        $this->assertEquals($expected, $actual);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testFindThrowsOnNoTaskFile()
    {
        $dir = dirname(__DIR__) . '/fixtures/no-taskfile';
        
        chdir($dir);
        
        (new ProjectFinder)->find();
    }

    /**
     * @expectedException LogicException
     */
    public function testFindThrowsOnEmptyTaskFile()
    {
        $dir = dirname(__DIR__) . '/fixtures/empty-taskfile';
        
        chdir($dir);
        
        (new ProjectFinder)->find();
    }

    /**
     * @expectedException LogicException
     */
    public function testFindThrowsOnNotProject()
    {
        $dir = dirname(__DIR__) . '/fixtures/invalid-taskfile';
        
        chdir($dir);
        
        (new ProjectFinder)->find();
    }
}
