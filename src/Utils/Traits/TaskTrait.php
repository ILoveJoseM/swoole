<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2022-02-14
 * Time: 15:05
 */

namespace JoseChan\Swoole\Utils\Traits;


use Swoole\Server;

/**
 * task任务进程的回调函数
 * Trait TaskTrait
 * @package JoseChan\Swoole\Utils\Traits
 */
trait TaskTrait
{
    /**
     * 接受任务
     * @param Server $server
     * @param int $task_id
     * @param int $src_worker_id
     * @param $data
     */
    protected function onTask(Server $server, int $task_id, int $src_worker_id, $data)
    {
        echo "[#{$server->worker_pid}] TaskWorker {$task_id} 接收来自 worker {$src_worker_id} 的任务：", serialize($data), "\n";
        $server->finish("");
    }

    /**
     * 任务执行完成（在worker进程执行）
     * @param Server $server
     * @param int $task_id
     * @param int $src_worker_id
     * @param $data
     */
    protected function onFinish(Server $server, int $task_id, int $src_worker_id, $data)
    {
        echo "[#{$server->worker_pid}] TaskWorker {$task_id} 任务已完成：", serialize($data), "\n";
    }
}
