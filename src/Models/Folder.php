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

    public function create($name)
    {
        $this->checkId();
        return $this->client()->post('space' . DS . $this->id . DS . $this->model, ["name" => $name]);
    }
}
