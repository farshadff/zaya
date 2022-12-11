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

    public function makeLink(string $link, string $domain = null,string $space=null)
    {
        $body = [
            'url' => $link,
            'domain' => $domain,
            'space' => $space,
        ];
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
}
