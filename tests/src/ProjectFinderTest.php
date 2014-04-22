<?php

namespace Task\Cli;

class ProjectFinderTest extends \PHPUnit_Framework_TestCase
{
    public function testFind()
    {
        $taskfile = __DIR__.'/../fixtures/Taskfile';
        $project = (new ProjectFinder)->find($taskfile);
        $this->assertEquals(require $taskfile, $project);
    }
}
