<?php
/**
 * @author:wangwei<1194023603@qq.com>
 * Project:lock
 * File:test.php
 * Time:2019/10/21 16:59
 */

$config = require '../config/config.php';
require '../vendor/autoload.php';
$app = new \WangWei\Lock\Application($config);
try {
    $app->lock->setLock('pay+1000', 7200, 3);
} catch (\Exception $e) {
    //捕捉异常
}

$app->lock->releaseLock('pay+1000');