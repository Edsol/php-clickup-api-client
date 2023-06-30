<?php

namespace ClickUpClient\Models;

use ClickUpClient\Traits\CommentTrait;
use ClickUpClient\Traits\MemberTrait;

class TaskList extends AbstractModel
{
    use CommentTrait;
    use MemberTrait;
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
}
