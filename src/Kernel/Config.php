<?php
/**
 * @author:wangwei<1194023603@qq.com>
 * Project:lock
 * File:Config.php
 * Time:2019/10/21 11:25
 */

namespace Wei\Lock\Kernel;


use DusanKasan\Knapsack\Collection;
use Wei\Lock\Kernel\Providers\CacheProvider;

class Config extends Collection
{
    protected $providers = [
        CacheProvider::class
    ];
}