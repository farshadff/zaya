<?php

namespace Farshadff\Zaya;

class Zaya
{
    public function __construct()
    {
        $this->apiKey = config('zaya.api_key');
    }

    public function makeLink()
    {
        return $this->apiKey;
    }
}
