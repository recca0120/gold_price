<?php

namespace App;

class GoldPrice
{
    /** @var Fetcher */
    private $fetcher;

    public function __construct(Fetcher $fetcher)
    {
        $this->fetcher = $fetcher;
    }

    public function history()
    {
        $html = $this->fetcher->fetch();

        preg_match_all('//', $html, $matches);
    }
}
