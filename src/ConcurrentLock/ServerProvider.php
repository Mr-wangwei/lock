<?php
/**
 * @author:wangwei<1194023603@qq.com>
 * Project:lock
 * File:ServerProvider.php
 * Time:2019/10/21 11:55
 */

namespace WangWei\Lock\ConcurrentLock;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServerProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        !isset($app['lock']) && $app['lock'] = function ($app) {
            return new LockSystem($app);
        };
    }
}