<?php
/**
 * @author:wangwei<1194023603@qq.com>
 * Project:lock
 * File:Application.php
 * Time:2019/10/21 11:49
 */

namespace Wei\Lock;


use Wei\Lock\ConcurrentLock\ServerProvider;
use Wei\Lock\Kernel\Providers\CacheProvider;
use Wei\Lock\Kernel\ServiceContainer;

/**
 *
 * Class Application
 * @package WangWei\Lock
 * @property \Wei\Lock\ConcurrentLock\LockSystem $lock
 */
class Application extends ServiceContainer
{
    protected $providers = [
        CacheProvider::class,
        ServerProvider::class
    ];
}