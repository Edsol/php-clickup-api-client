<?php

namespace ClickUpClient;

define('DOT', '.');
define('DS', '/');

class Client
{
    private $guzzleClient;
    private const MODELS_NAMESPACE = __NAMESPACE__.'\\Models\\';
    private $models_match = [
        'TaskList' => 'list',
    ];

    public function __construct($apiToken)
    {
        $this->guzzleClient = new \GuzzleHttp\Client([
            'base_uri' => 'https://api.clickup.com/api/v2/',
            'headers' => [
                'Authorization' => $apiToken,
            ],
        ]);
    }

    /**
     * client.
     *
     * @return Client
     */
    public function client()
    {
        return $this;
    }

    /**
     * __call.
     *
     * @param mixed $name
     * @param mixed $arguments
     *
     * @return void
     */
    public function __call(string $name, array $arguments)
    {
        if (class_exists(self::MODELS_NAMESPACE.ucfirst($name)) === false) {
            throw new \Exception("`$name` is not a method or object", 1);
        }
        $model = ucfirst($name);
        $model_namespaced = self::MODELS_NAMESPACE.$model;

        if (array_key_exists($model, $this->models_match)) {
            $model = $this->models_match[$model];
        }

        $object = new $model_namespaced($this, $arguments[0] ?? null);

        return $object;
    }

    /**
     * @return mixed
     */
    public function get(string $method, array $params = [])
    {
        $response = $this->guzzleClient->get($method, ['query' => $params]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @return mixed
     */
    public function post(string $method, array $body = [])
    {
        $response = $this->guzzleClient->post($method, ['json' => $body]);

        return json_decode($response->getBody(), true);
    }

    /**
     * delete.
     *
     * @param mixed $method
     *
     * @return int
     */
    public function delete(string $method)
    {
        $response = $this->guzzleClient->delete($method);

        return $response->getStatusCode();
    }

    /**
     * put.
     *
     * @param mixed $method
     * @param mixed $body
     *
     * @return void
     */
    public function put(string $method, array $body = [])
    {
        $response = $this->guzzleClient->put($method, ['json' => $body]);

        return json_decode($response->getBody(), true);
    }

    /**
     * multipart.
     *
     * @param mixed $method
     * @param mixed $attachment
     *
     * @return void
     */
    public function multipart(string $method, $attachment)
    {
        $response = $this->guzzleClient->post($method, ['multipart' => [$attachment]]);

        return json_decode($response->getBody(), true);
    }
}
