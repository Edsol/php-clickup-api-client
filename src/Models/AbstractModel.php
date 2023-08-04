<?php

namespace ClickUpClient\Models;

use ClickUpClient\Client;

abstract class AbstractModel
{
    public $model;
    /* @var Client $client */
    public $client;
    public $id;

    /* @var array $extra */
    private $extra;

    /**
     * @param array $array
     */
    public function __construct(Client $client, string $id = null)
    {
        $this->setClient($client);
        if (!empty($id)) {
            $this->setId($id);
        }
    }

    // abstract protected function fromArray($array);

    /**
     * @return Client
     */
    protected function client()
    {
        return $this->client;
    }

    /**
     * setClient.
     *
     * @param mixed $client
     *
     * @return void
     */
    private function setClient(Client $client)
    {
        $this->client = $client;
    }

    /**
     * setModel.
     *
     * @return void
     */
    public function setModel(string $model)
    {
        $this->model = $model;
    }

    /**
     * checkId.
     *
     * @return void
     */
    public function checkId()
    {
        if ($this->id === null) {
            throw new \Exception('An ID is required to make the request', 1);
        }
    }

    /**
     * setId.
     *
     * @param mixed $id
     *
     * @return void
     */
    public function setId(string $id)
    {
        $this->id = $id;
    }

    /**
     * get
     *
     * @param  string $id
     * @return void
     */
    public function get(string $id = null)
    {
        return $this->client()->get($this->model . DS . ($id ?? $this->id));
    }

    /**
     * delete
     *
     * @param  string $id
     * @return void
     */
    public function delete(string $id = null)
    {
        return $this->client()->delete($this->model . DS . ($id ?? $this->id));
    }
}
