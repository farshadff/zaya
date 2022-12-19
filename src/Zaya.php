<?php

namespace Farshadff\Zaya;

use GuzzleHttp\Client;
use PhpParser\Node\Expr\Cast\Object_;

class Zaya
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

    public function makeLink(string $link, array $params = null)
    {
        $link = [
            'url' => $link,
        ];
        $body = isset($params) ? array_merge($link, $params) : $link;

        $response = $this->client->post($this->baseUrl . 'links', [
            'form_params' => $body,
            'headers' => $this->headers
        ]);
        return json_decode($response->getBody()->getContents())->data->short_url;
    }

    public function listLink()
    {
        $response = $this->client->get($this->baseUrl . 'links', [
            'headers' => $this->headers
        ]);
        return json_decode($response->getBody()->getContents())->data;
    }

    public function detailLink($id)
    {
        $response = $this->client->get($this->baseUrl . 'links/' . $id, [
            'headers' => $this->headers
        ]);
        return collect(json_decode($response->getBody()->getContents())->data);
    }

    public function updateLink($id, $link)
    {
        $body = [
            'url' => $link
        ];
        $response = $this->client->patch($this->baseUrl . 'links/' . $id, [
            'form_params' => $body,
            'headers' => $this->headers
        ]);
        return json_decode($response->getBody()->getContents())->data->short_url;
    }

    public function deleteLink($id)
    {
        $response = $this->client->delete($this->baseUrl . 'links/' . $id, [
            'headers' => $this->headers
        ]);

        return $response->getBody()->getContents();
    }

    public function makeSpace(string $name, string $color)
    {
        $body = [
            'name' => $name,
            'color' => $color,
        ];
        $response = $this->client->post($this->baseUrl . 'spaces', [
            'form_params' => $body,
            'headers' => $this->headers
        ]);
        return json_decode($response->getBody()->getContents())->data;
    }

    public function listSpace()
    {
        $response = $this->client->get($this->baseUrl . 'spaces', [
            'headers' => $this->headers
        ]);
        return json_decode($response->getBody()->getContents())->data;
    }

    public function detailSpace($id)
    {
        $response = $this->client->get($this->baseUrl . 'spaces/' . $id, [
            'headers' => $this->headers
        ]);
        return collect(json_decode($response->getBody()->getContents())->data);
    }

    public function updateSpace($id, $name = null, $color = null)
    {
        $body = [
            'name' => $name,
            'color' => $color
        ];
        $response = $this->client->patch($this->baseUrl . 'spaces/' . $id, [
            'form_params' => $body,
            'headers' => $this->headers
        ]);
        return json_decode($response->getBody()->getContents())->data;
    }

    public function deleteSpace($id)
    {
        $response = $this->client->delete($this->baseUrl . 'spaces/' . $id, [
            'headers' => $this->headers
        ]);

        return $response->getBody()->getContents();
    }

    public function listDomain()
    {
        $response = $this->client->get($this->baseUrl . 'domains', [
            'headers' => $this->headers
        ]);
        return json_decode($response->getBody()->getContents())->data;
    }

    public function makeDomain(string $name, string $index = null, string $notFound = null)
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
        } catch(\Exception $e) {
            return $e->getResponse()->getBody()->getContents();
        }
        return json_decode($response->getBody()->getContents())->data;
    }
    public function detailDomain($id)
    {
        $response = $this->client->get($this->baseUrl . 'domains/' . $id, [
            'headers' => $this->headers
        ]);
        return collect(json_decode($response->getBody()->getContents())->data);
    }

}
