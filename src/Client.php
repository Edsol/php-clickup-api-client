<?php

namespace ClickUpClient;

// define('DOT', '.');
// define('DS', '/');

class Client
{
    private $guzzleClient;
    private const MODELS_NAMESPACE = __NAMESPACE__ . "\\Models\\";
    private $models_match = [
        'TaskList' => 'list'
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
     * client
     *
     * @return Client
     */
    public function client()
    {
        return $this;
    }

    /**
     * __call
     *
     * @param  mixed $name
     * @param  mixed $arguments
     * @return void
     */
    public function __call(string $name, array $arguments)
    {
        if (class_exists(self::MODELS_NAMESPACE . ucfirst($name)) === false) {
            throw new \Exception("`$name` is not a method or object", 1);
        }
        $model = ucfirst($name);
        $model_namespaced = self::MODELS_NAMESPACE . $model;

        if (array_key_exists($model, $this->models_match)) {
            $model = $this->models_match[$model];
        }

        $object = new $model_namespaced($this, $arguments[0] ?? null);
        return $object;
    }

    /**
     * @param string $method
     * @param array  $params
     * @return mixed
     */
    public function get($method, $params = [])
    {
        $response = $this->guzzleClient->request('GET', $method, ['query' => $params]);
        return json_decode($response->getBody(), true);
    }

    /**
     * @param string $method
     * @param array $body
     * @return mixed
     */
    public function post($method, $body = [])
    {
        $response = $this->guzzleClient->request('POST', $method, ['json' => $body]);
        return json_decode($response->getBody(), true);
    }

    /**
     * delete
     *
     * @param  mixed $method
     * @return int
     */
    public function delete($method)
    {
        $response = $this->guzzleClient->request('DELETE', $method);
        return $response->getStatusCode();
    }

    public function put($method, $body = [])
    {
        $response = $this->guzzleClient->request('PUT', $method, ['json' => $body]);
        return json_decode($response->getBody(), true);
    }
}
