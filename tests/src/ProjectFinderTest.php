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

    /**
     * @expectedException InvalidArgumentException
     */
    public function testFindThrowsOnNoTaskFile()
    {
        (new ProjectFinder)->find('nope');
    }

    /**
     * @expectedException LogicException
     */
    public function testFindThrowsOnEmptyTaskFile()
    {
        $taskfile = tempnam(sys_get_temp_dir(), 'taskfile');
        (new ProjectFinder)->find($taskfile);
        unlink($taskfile);
    }

    /**
     * @expectedException LogicException
     */
    public function testFindThrowsOnNotProject()
    {
        $taskfile = tempnam(sys_get_temp_dir(), 'taskfile');
        file_put_contents($taskfile, '<?php return "foo";');
        (new ProjectFinder)->find($taskfile);
        unlink($taskfile);
    }
}
