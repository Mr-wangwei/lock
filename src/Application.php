<?php
/**
 * @author:wangwei<1194023603@qq.com>
 * Project:lock
 * File:Application.php
 * Time:2019/10/21 11:49
 */

namespace WangWei\Lock;


use WangWei\Lock\ConcurrentLock\ServerProvider;
use WangWei\Lock\Kernel\Providers\CacheProvider;
use WangWei\Lock\Kernel\ServiceContainer;

/**
 *
 * Class Application
 * @package WangWei\Lock
 * @property \WangWei\Lock\ConcurrentLock\LockSystem $lock
 */
class Application extends ServiceContainer
{
    protected $providers = [
        CacheProvider::class,
        ServerProvider::class
    ];
}