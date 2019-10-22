<?php
/**
 * @author:wangwei<1194023603@qq.com>
 * Project:lock
 * File:config.php
 * Time:2019/10/21 16:58
 */
return [
    'cache' => [
        //http://doctrine-orm.readthedocs.io/projects/doctrine-orm/en/latest/reference/caching.html
        'default'           => 'redis',
        'stores'            => [
            'file'      => [
                'driver' => 'file',
                'patch'  => __DIR__ . DIRECTORY_SEPARATOR . 'cache',
            ],
            'memcached' => [
                'server' => '127.0.0.1',
                'port'   => 11211,
            ],
            'redis'     => [
                'driver'   => 'predis',
                'host'     => '127.0.0.1',
                'password' => null,
                'port'     => 6379,
                'database' => 0,
            ],
        ],
    ],
];