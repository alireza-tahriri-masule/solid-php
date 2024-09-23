<?php

interface WorkableInterface {
    public function work();
}

class BackendDeveloper implements WorkableInterface {
    public function work() {
        return '(backend): coding...';
    }
}

class FrontendDeveloper implements WorkableInterface {
    public function work() {
        return '(frontend): coding...';
    }
}

class FullstackDeveloper implements WorkableInterface {
    public function work() {
        return '(fullstack): coding...';
    }
}

class ProjectManagement {
    public $member;

    public function proccess(WorkableInterface $member)
    {
        $member->work(); 
    }
}

$fullstack = new FullstackDeveloper();
$backend = new BackendDeveloper();
$frontend = new FrontendDeveloper();

$projectmanagement = new ProjectManagement();
$projectmanagement->proccess($fullstack);
$projectmanagement->proccess($backend);
$projectmanagement->proccess($frontend);