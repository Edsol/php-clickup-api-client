<?php

namespace ClickUpClient\Traits;

trait CommentTrait
{
    /**
     * getComment
     *
     * @return void
     */
    public function comments()
    {
        $this->checkId();
        return $this->client->get($this->model . DS . $this->id . DS . "comment");
    }

    /**
     * createComment
     *
     * @param  array $body
     *
     * @return void
     */
    public function createComment(array $body)
    {
        $this->checkId();
        return $this->client()->post($this->model . DS . $this->id . DS . "comment", $body);
    }

    public function update(array $body)
    {
        $this->checkId();
        return $this->client()->put($this->model . DS . $this->id, $body);
    }

    /**
     * deleteComment
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteComment(String $id)
    {
        return $this->client()->delete($this->model . DS . $id);
    }
}
