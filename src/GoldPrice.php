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

        $rows = array_map(function ($row) {
            return $this->parseCols($row);
        }, $this->parseRows($html));

        array_shift($rows);

        return $rows;
    }

    /**
     * @param $html
     * @return mixed
     */
    private function parseRows($html)
    {
        preg_match_all('/<tr>(?<rows>(.*?))<\/tr>/s', $html, $matches);

        return $matches['rows'];
    }

    private function parseCols($row)
    {
        preg_match_all('/<t(h|d)[^>]*>(?<cols>(.*?))<\/t(h|d)>/s', $row, $matches);

        return array_map(function ($col) {
            return strip_tags($col);
        }, $matches['cols']);
    }
}
