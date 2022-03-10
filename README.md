# swoole组件

## 安装

````ssh
composer require "jose-chan/swoole-server" -vvv
````

## laravel发布

````ssh
php artisan vendor:publish --tag=swoole-server
````

## laravel使用

````php
<?php
try{
    /** @var \JoseChan\Swoole\Server\Server $server */
    $server = app()->make(\JoseChan\Swoole\Server\Server::class);
    $server->options()->task_worker_num = 2;
    $server->options()->daemonize = 1;

//    $server->event()->start(function (Server $server){
//        echo "server start";
//    });


    $server->start();
}catch (\Exception $e){
    echo $e->getMessage();
}
````

## 其他使用

````php
<?php

require "vendor/autoload.php";

$options = new \JoseChan\Swoole\Utils\Options();
$options->worker_num = 10;
$options->max_request = 10;
$options->daemonize = 1;
$options->task_worker_num = 2;

$listener = new \JoseChan\Swoole\Utils\Listener("127.0.0.1", 8001);
$event = new \JoseChan\Swoole\Utils\Events();

$server = new \JoseChan\Swoole\Server\Server($options, $listener, $event);
$server->start();

````

