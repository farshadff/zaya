<?php

namespace Farshadff\Zaya;

use GuzzleHttp\Client;
use PhpParser\Node\Expr\Cast\Object_;

class ZayaAccount
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

    public function detail()
    {
        try {
            $response = $this->client->get($this->baseUrl . 'account', [
                'headers' => $this->headers
            ]);
        } catch (\Exception $e) {
            return $e->getResponse()->getBody()->getContents();
        }
        return response()->json(json_decode($response->getBody()->getContents())->data);
    }



}
