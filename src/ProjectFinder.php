<?php

namespace Task\Cli;

use Task\Project;

class ProjectFinder
{
    /**
     * Taskfile basename variants, in priority order.
     * 
     * @var array
     */
    private $variants = ['Taskfile', 'taskfile', 'taskfile.php'];
    
    /**
     * @return string|null
     */
    public function findTaskfile()
    {
        $taskfile = null;
        
        $cwd = getcwd();
        
        foreach($this->variants as $variant)
        {
            $file = $cwd . DIRECTORY_SEPARATOR . $variant;
            
            if(is_file($file))
            {
                $taskfile = $file;
                
                break;
            }
        }
        
        return $taskfile;
    }
    
    public function find()
    {
        $taskfile = $this->findTaskfile();
        
        // FIXME: This can go in findTaskfile() and then we can get rid of returning NULL.
        if($taskfile === null)
        {
            throw new \InvalidArgumentException("$taskfile not found");
        }

        // FIXME: This is redundant, because return check below will handle this.
        if(filesize($taskfile) === 0)
        {
            throw new \LogicException("Taskfile is empty");
        }

        $project = require $taskfile;
        
        if(!($project instanceof '\Task\Project'))
        {
            throw new \LogicException("Taskfile must return an instance of '\Task\Project'");
        }

        return $project;
    }
}
