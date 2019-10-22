## 安装
```php
composer require "wangwei/lock";
```

## 使用
```php
use WangWei\Lock\Application;

$config = [
    'cache' => [
        'default' => 'redis',
        'stores' => [
            'file' => [
                 'driver' => 'file',
                 'patch'  => __DIR__ . DIRECTORY_SEPARATOR . 'cache',
            ],
            'memcached' => [
                 'server' => '127.0.0.1',
                 'port'   => 11211,
            ],
            'redis' => [
                 'driver'   => 'predis',
                 'host'     => '127.0.0.1',
                 'password' => null,
                 'port'     => 6379,
                 'database' => 0,
            ],
        ],
    ],
];

$app = new Application($config);

//上锁
try {
    $app->lock->setLock('key', 7200, 0);
} catch (\Exception $e) {
    //捕捉异常
}

//释放锁
$app->lock->releaseLock('key');
```
