<?php
return [
    //用户及权限管理
    'admin' => [
        'type' => 'mysql',
        'servers' => [
            ['host' => '122.11.33.16', 'port' => 3306]
        ],
        'user' => 'root',
        'password' => '123123',
        'charset' => 'utf8',
        'database' => 'data_web'
    ],
    //日报
    'ku6_report' => [
        'type' => 'mysql',
        'servers' => [
            ['host' => '122.11.32.175', 'port' => 3310]
        ],
        'user' => 'ku6_report',
        'password' => 'ku6@963147!@#$pwd',
        'charset' => 'utf8',
        'database' => 'ku6_report'
    ],
    //上传转码分发
    'new_utcc' => [
        'type' => 'mysql',
        'servers' => [
            ['host' => '122.11.45.195', 'port' => 3317]
        ],
        'user' => 'kou',
        'password' => 'Ku6@oss.com',
        'charset' => 'utf8',
        'database' => 'new_utcc'
    ],
    //李长鹏机器监控
    'zebra' => [
        'type' => 'mysql',
        'servers' => [
            ['host' => '122.11.33.188', 'port' => 3306]
        ],
        'user' => 'zreportor',
        'password' => '1234Qwerx',
        'charset' => 'utf8',
        'database' => 'zebra'
    ],
    'chaxun'=> [
        'type' => 'mysql',
        'servers' => [
            ['host' => '122.11.33.65', 'port' => 3306]
        ],
        'user' => 'chaxun',
        'password' => 'chaxun122113365',
        'charset' => 'utf8',
        'database' => 'chaxun'
    ]
];