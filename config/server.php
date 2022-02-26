<?php

return [
    //swoole server的配置项，具体请查阅swoole文档
    "options" => [
        "worker_number" => 10,
//        "daemonize" => 1,
        "max_request" => 10,
        "max_conn" => 10000,
        "heartbeat_check_interval" => 30,
        "heartbeat_idle_time" => 600
    ],
    //监听端口
    "listener" => [
        "host" => "127.0.0.1",
        "port" => "8001"
    ]
];
