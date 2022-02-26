<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2022-02-14
 * Time: 14:39
 */

namespace JoseChan\Swoole\Utils\Traits;


use Swoole\Server;

trait ServerRequiredTrait
{
    /**
     * 服务器收到数据
     * TODO: 涉及粘包半包，通常需要实现合包、拆包逻辑
     * @param Server $server
     * @param int $fd
     * @param int $reactorId
     * @param string $data
     */
    protected function onReceive(Server $server, int $fd, int $reactorId, string $data)
    {
        echo "[#{$server->worker_pid}] worker {$server->worker_id} 接收到数据:{$data}; 链接通道描述符:{$fd}; reactor线程id:{$reactorId}\n";
    }
}
