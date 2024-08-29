<?php

namespace ClickUpClient\Models;

use ClickUpClient\Traits\CommentTrait;
use ClickUpClient\Traits\MemberTrait;
use ClickUpClient\Traits\CustomFieldsTrait;

class TaskList extends AbstractModel
{
    use CommentTrait;
    use MemberTrait;
    use CustomFieldsTrait;
    public $model = 'list';

    /**
     * addTask.
     *
     * @param mixed $data
     *
     * @return void
     */
    public function addTask(array $data)
    {
        $this->checkId();

        return $this->client()->post($this->model.DS.$this->id.DS.'task', $data);
    }

    public function getTasks(array $data=[]) {
        $this->checkId();

        return $this->client()->get($this->model.DS.$this->id.DS.'task', $data);
    }
}
