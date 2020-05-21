<?php


class Comments
{
    protected $id;
    protected $name;
    protected $body;
    protected $entry_id;

    public function __construct($name, $body, $entry_id)
    {
        $this->name = $name;
        $this->body = $body;
        $this->entry_id = $entry_id;
    }
}