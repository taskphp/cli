<?php

namespace Task\Cli;

use Task\Project;

class ProjectFinder
{
    /**
     * Directory to search for Taskfiles
     *
     * @var string
     */
    private $cwd;

    /**
     * Taskfile basename variants, in priority order.
     * 
     * @var array
     */
    private $variants = ['Taskfile', 'taskfile', 'taskfile.php'];
    
    public function __construct($cwd = null)
    {
        $this->cwd = $cwd ?: getcwd();
    }

    public function getCwd()
    {
        return $this->cwd;
    }

    /**
     * @return string|false
     */
    public function findTaskfile()
    {
        foreach ($this->variants as $variant) {
            $file = $this->getCwd() . DIRECTORY_SEPARATOR . $variant;
            
            if (is_file($file)) {
                return $file;
            }
        }
        
        return false;
    }
    
    /**
     * @return Task\Project
     * @throws RuntimeException
     */
    public function find()
    {
        if (!$taskfile = $this->findTaskfile()) {
            throw new \RuntimeException("No Taskfile found");
        }

        $project = require $taskfile;
        
        if (!($project instanceof Project)) {
            throw new \UnexpectedValueException("Taskfile must return an instance of 'Task\Project'");
        }

        return $project;
    }
}
