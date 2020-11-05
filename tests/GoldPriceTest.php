<?php

namespace Tests;

use App\Fetcher;
use App\GoldPrice;
use DMS\PHPUnitExtensions\ArraySubset\Assert;
use PHPUnit\Framework\TestCase;

class GoldPriceTest extends TestCase
{
    public function test_fetch_price()
    {
        $goldPrice = new GoldPrice(new FakeFetcher());
        $rows = $goldPrice->history();

        $this->assertEquals([
            '2020/11/05',
            '新台幣 (TWD)',
            '1公克',
            '1739',
            '1762',
        ], $rows[0]);
    }
}

class FakeFetcher extends Fetcher
{
    public function fetch()
    {
        return file_get_contents('gold.html');
    }
}
