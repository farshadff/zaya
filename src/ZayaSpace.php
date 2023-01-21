<?php

namespace Farshadff\Zaya;

use GuzzleHttp\Client;
use PhpParser\Node\Expr\Cast\Object_;

class ZayaSpace
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

    public function make(string $name, string $color)
    {
        $body = [
            'name' => $name,
            'color' => $color,
        ];
        try {
            $response = $this->client->post($this->baseUrl . 'spaces', [
                'form_params' => $body,
                'headers' => $this->headers
            ]);
        } catch (\Exception $e) {
            return $e->getResponse()->getBody()->getContents();
        }
        return json_decode($response->getBody()->getContents())->data;
    }

    public function list()
    {
        try {
            $response = $this->client->get($this->baseUrl . 'spaces', [
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
            $response = $this->client->get($this->baseUrl . 'spaces/' . $id, [
                'headers' => $this->headers
            ]);
        } catch (\Exception $e) {
            return $e->getResponse()->getBody()->getContents();

        }
        return collect(json_decode($response->getBody()->getContents())->data);
    }

    public function update($id, $name = null, $color = null)
    {
        $body = [
            'name' => $name,
            'color' => $color
        ];
        try {
            $response = $this->client->patch($this->baseUrl . 'spaces/' . $id, [
                'form_params' => $body,
                'headers' => $this->headers
            ]);
        } catch (\Exception $e) {
            return $e->getResponse()->getBody()->getContents();
        }
        return json_decode($response->getBody()->getContents())->data;
    }

    public function delete($id)
    {
        try {
            $response = $this->client->delete($this->baseUrl . 'spaces/' . $id, [
                'headers' => $this->headers
            ]);
        } catch (\Exception $e) {
            return $e->getResponse()->getBody()->getContents();
        }

        return $response->getBody()->getContents();
    }
}
