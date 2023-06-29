<?php

namespace ClickUpClient\Traits;

trait MemberTrait
{
    /**
     * get members of task
     *
     * @return void
     */
    public function members(string $id = null)
    {
        $this->checkId();
        return $this->client()->get($this->model . DS . ($id ?? $this->id) . DS . "member");
    }
}
