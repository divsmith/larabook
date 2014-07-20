<?php namespace Larabook\Statuses\Events; 

class StatusWasPublished {

    public $body;

    public function __construct($body)
    {
        $this->body = $body;
    }
} 