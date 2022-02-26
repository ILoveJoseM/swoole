<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2022-02-14
 * Time: 15:05
 */

namespace JoseChan\Swoole\Utils\Traits;


use Swoole\Server;

trait TaskTrait
{
    protected function onTask(Server $server, int $task_id, int $src_worker_id, $data)
    {
        echo "[#{$server->worker_pid}] TaskWorker {$task_id} 接收来自 worker {$src_worker_id} 的任务：", serialize($data), "\n";
        $server->finish("");
    }

    protected function onFinish(Server $server, int $task_id, int $src_worker_id, $data)
    {
        echo "[#{$server->worker_pid}] TaskWorker {$task_id} 任务已完成：", serialize($data), "\n";
    }
}
