<?php

namespace Farshadff\Zaya;

use GuzzleHttp\Client;
use PhpParser\Node\Expr\Cast\Object_;

class ZayaLink
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

    public function create(string $link, array $params = null)
    {
        $link = [
            'url' => $link,
        ];
        $body = isset($params) ? array_merge($link, $params) : $link;

        try {
            $response = $this->client->post($this->baseUrl . 'links', [
                'form_params' => $body,
                'headers' => $this->headers
            ]);
        } catch (\Exception $e) {
            return $e->getResponse()->getBody()->getContents();

        }
        return json_decode($response->getBody()->getContents())->data->short_url;
    }

    public function list()
    {
        try {
            $response = $this->client->get($this->baseUrl . 'links', [
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
            $response = $this->client->get($this->baseUrl . 'links/' . $id, [
                'headers' => $this->headers
            ]);
        } catch (\Exception $e) {
            return $e->getResponse()->getBody()->getContents();

        }
        return collect(json_decode($response->getBody()->getContents())->data);
    }

    public function update($id, $link)
    {
        $body = [
            'url' => $link
        ];
        try {
            $response = $this->client->patch($this->baseUrl . 'links/' . $id, [
                'form_params' => $body,
                'headers' => $this->headers
            ]);
        } catch (\Exception $e) {
            return $e->getResponse()->getBody()->getContents();

        }
        return json_decode($response->getBody()->getContents())->data->short_url;
    }

    public function delete($id)
    {
        try {
            $response = $this->client->delete($this->baseUrl . 'links/' . $id, [
                'headers' => $this->headers
            ]);
        } catch (\Exception $e) {
            return $e->getResponse()->getBody()->getContents();

        }

        return $response->getBody()->getContents();
    }
}
