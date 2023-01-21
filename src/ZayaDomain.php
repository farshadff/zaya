<?php

namespace Farshadff\Zaya;

use GuzzleHttp\Client;
use PhpParser\Node\Expr\Cast\Object_;

class ZayaDomain
{
    private $client;

    public function __construct()
    {
        $this->apiKey = config('zaya.api_key');
        $this->baseUrl = config('zaya.base_url');
        $this->client = new Client();
        $this->headers = [
            'Authorization' => 'Bearer ' . $this->apiKey,
        ];

    }

    public function list()
    {
        try {
            $response = $this->client->get($this->baseUrl . 'domains', [
                'headers' => $this->headers
            ]);
        } catch (\Exception $e) {
            return $e->getResponse()->getBody()->getContents();
        }
        return json_decode($response->getBody()->getContents())->data;
    }

    public function create(string $name, string $index = null, string $notFound = null)
    {
        $body = [
            'name' => $name,
            'index_page' => $index,
            'not_found_page' => $notFound,
        ];
        try {
            $response = $this->client->post($this->baseUrl . 'domains', [
                'form_params' => $body,
                'headers' => $this->headers
            ]);
        } catch (\Exception $e) {
            return $e->getResponse()->getBody()->getContents();
        }
        return json_decode($response->getBody()->getContents())->data;
    }

    public function get($id)
    {
        try {
            $response = $this->client->get($this->baseUrl . 'domains/' . $id, [
                'headers' => $this->headers
            ]);
        } catch (\Exception $e) {
            return $e->getResponse()->getBody()->getContents();

        }
        return collect(json_decode($response->getBody()->getContents())->data);
    }

    public function delete($id)
    {
        try {
            $response = $this->client->delete($this->baseUrl . 'domains/' . $id, [
                'headers' => $this->headers
            ]);
        } catch (\Exception $e) {
            return $e->getResponse()->getBody()->getContents();
        }
        return $response->getBody()->getContents();
    }

}
