<?php


namespace App;


class Fetcher
{

    /**
     * @return false|string
     */
    public function fetch()
    {
        $url = 'https://rate.bot.com.tw/gold/chart/ltm/TWD';
        $options = [
            'http' => [
                'header' => 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36',
            ],
        ];

        return file_get_contents($url, false, stream_context_create($options));
    }
}
