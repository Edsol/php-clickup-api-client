<?php

namespace ClickUpClient\Models;

class Space extends AbstractModel
{
    public $model = 'space';

    /**
     * tags.
     *
     * @return void
     */
    public function tags()
    {
        return $this->client()->get($this->model.DS.$this->id.DS.'tag');
    }

    /**
     * folders.
     *
     * @return void
     */
    public function folders()
    {
        return $this->client()->get($this->model.DS.$this->id.DS.'folder');
    }
}
