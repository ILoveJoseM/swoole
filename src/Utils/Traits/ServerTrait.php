<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2022-02-14
 * Time: 14:54
 */

namespace JoseChan\Swoole\Utils\Traits;


use Swoole\Server;

trait ServerTrait
{
    /**
     * 主进程执行，服务器开启
     * @param Server $server
     */
    protected function onStart(Server $server)
    {
        echo "[#{$server->master_pid}] 服务器已启动\n";
    }

    /**
     * 主进程执行，服务器关闭
     * @param Server $server
     */
    protected function onShutdown(Server $server)
    {
        echo "[#{$server->master_pid}] 服务器已关闭\n";
    }

    /**
     * worker/task进程执行，worker进程启动
     * @param Server $server
     * @param int $workerId
     */
    protected function onWorkerStart(Server $server, int $workerId)
    {
        if ($server->taskworker) {
            echo "[#{$server->worker_pid}] TaskWorker {$workerId} 已启动\n";
        } else {
            echo "[#{$server->worker_pid}] Worker {$workerId} 已启动\n";
        }

    }

    /**
     * worker/task进程执行，worker进程关闭
     * @param Server $server
     * @param int $workerId
     */
    protected function onWorkerStop(Server $server, int $workerId)
    {
        if ($server->taskworker) {
            echo "[#{$server->worker_pid}] TaskWorker {$workerId} 已终止\n";
        } else {
            echo "[#{$server->worker_pid}] Worker {$workerId} 已终止\n";

        }
    }

    /**
     * worker进程执行，worker进程接收到连接
     * @param Server $server
     * @param int $fd
     * @param int $reactorId
     */
    protected function onConnect(Server $server, int $fd, int $reactorId)
    {
        echo "[#{$server->worker_pid}] worker {$server->worker_id} 已连接; 链接通道描述符:{$fd}; reactor线程id:{$reactorId}\n";
    }

    /**
     * worker进程执行，worker进程关联的连接断开了
     * @param Server $server
     * @param int $fd
     * @param int $reactorId
     */
    protected function onClose(Server $server, int $fd, int $reactorId)
    {
        echo "[#{$server->worker_pid}] worker {$server->worker_id} 连接断开; 链接通道描述符:{$fd}; reactor线程id:{$reactorId}\n";
    }

    /**
     * worker/task进程执行，进程出错了
     * TODO:需要实现对错误的处理
     * @param Server $server
     * @param int $worker_id
     * @param int $worker_pid
     * @param int $exit_code
     * @param int $signal
     */
    protected function onWorkerError(Server $server, int $worker_id, int $worker_pid, int $exit_code, int $signal)
    {
        if ($server->taskworker) {
            echo "[#{$server->worker_pid}] TaskWorker {$worker_id} 发生错误, exit_code: {$exit_code}, signal: {$signal}\n";
        } else {
            echo "[#{$server->worker_pid}] Worker {$worker_id} 发生错误, exit_code: {$exit_code}, signal: {$signal}\n";

        }
    }

    /**
     * manager进程执行，manager进程开启了
     * @param Server $server
     */
    protected function onManagerStart(Server $server)
    {
        echo "[#{$server->manager_pid}] Manager 已启动\n";
    }

    /**
     * manager进程执行，manager进程关闭了
     * @param Server $server
     */
    protected function onManagerStop(Server $server)
    {
        echo "[#{$server->manager_pid}] Manager 已终止\n";
    }
}
