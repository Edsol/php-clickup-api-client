<?php

namespace ClickUpClient\Models;

use \ClickUpClient\WebhookTrait;

class Team extends AbstractModel
{

    use WebhookTrait;

    public $model = 'team';

    /**
     * get all teams
     *
     * @return void
     */
    public function all()
    {
        return $this->client()->get($this->model);
    }

    /**
     * spaces
     *
     * @return void
     */
    public function spaces()
    {
        $this->checkId();
        return $this->client->get($this->model . DS . $this->id . DS . "space");
    }


    /**
     * user
     *
     * @param  mixed $user_id
     * @return void
     */
    public function user(string $user_id)
    {
        $this->checkId();
        return $this->client->get($this->model . DS . $this->id . DS . "user" . DS . $user_id);
    }
}
