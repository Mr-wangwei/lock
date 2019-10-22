<?php
/**
 * @author:wangwei<1194023603@qq.com>
 * Project:lock
 * File:LockSystem.php
 * Time:2019/10/21 11:57
 */

namespace WangWei\Lock\ConcurrentLock;


use WangWei\Lock\Kernel\ServiceContainer;

class LockSystem
{
    protected $app;

    public function __construct(ServiceContainer $app)
    {
        $this->app = $app;
    }

    /**
     * 上锁
     * @param string $lockKey
     * @param int $lifeTime 锁失效时间（秒）
     * @param int $blockTime 阻塞时间（秒）
     * @return mixed
     * @throws \Exception
     */
    public function setLock($lockKey, $lifeTime = 7200, $blockTime = 0)
    {
        $cache = $this->app['cache'];
        if (!$cache->contains($lockKey)) {
            return $cache->save($lockKey, 1, $lifeTime);
        }

        if ($blockTime === 0) {
            throw new \Exception('can not get lock');
        }

        $waitime = 200000; // 0.2 秒
        $totalWaitime = 0;
        $time = $blockTime * 1000000;
        while ($totalWaitime < $time) {
            usleep($waitime);
            if (!$cache->contains($lockKey)) {
                return $cache->save($lockKey, 1, $lifeTime);
                break;
            }
            $totalWaitime += $waitime;
        }

        if ($totalWaitime >= $time) {
            throw new \Exception('can not get lock for waiting ' . $blockTime . 's.');
        }
    }

    /**
     * 释放锁
     * @param string $lockKey
     */
    public function releaseLock($lockKey)
    {
        $this->app['cache']->delete($lockKey);
    }


}