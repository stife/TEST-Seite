<?php
require_once __DIR__ . '/../vendor/autoload.php';
$config = require __DIR__ . '/config.php';

use GuzzleHttp\Client;

class FacebookAPI {
    private Client $client;
    private string $token;

    public function __construct(string $token) {
        $this->client = new Client(['base_uri' => 'https://graph.facebook.com/']);
        $this->token = $token;
    }

    public function get(string $endpoint, array $params = []): array {
        $params['access_token'] = $this->token;
        $response = $this->client->get($endpoint, ['query' => $params]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function post(string $endpoint, array $data = []): array {
        $data['access_token'] = $this->token;
        $response = $this->client->post($endpoint, ['form_params' => $data]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function delete(string $endpoint): array {
        $response = $this->client->delete($endpoint, ['query' => ['access_token' => $this->token]]);
        return json_decode($response->getBody()->getContents(), true);
    }
}

$fb = new FacebookAPI($config['fb_access_token']);
