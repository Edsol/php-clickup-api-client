<?php

namespace ClickUpClient\Models;

class Folder extends AbstractModel
{
    public $model = 'folder';

    /**
     * get all list
     *
     * @return void
     */
    public function lists()
    {
        $this->checkId();
        return $this->client()->get($this->model . DS . $this->id . DS . "list");
    }

    /** 
     * create a list
     * 
     * @return mixed
     */
    public function createList($name) {
        $this->checkId();
        return $this->client()->post($this->model . DS . $this->id . DS . "list", ["name" => $name]);
    }

    /**
     * Create a folder
     * @param mixed $name
     * @return mixed
     */
    public function create($name)
    {
        $this->checkId();
        return $this->client()->post('space' . DS . $this->id . DS . $this->model, ["name" => $name]);
    }
}
