<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2022-02-21
 * Time: 18:30
 */

namespace JoseChan\Swoole\Utils;


use Swoole\WebSocket\Server;
use Swoole\WebSocket\Frame;

/**
 * websocket抽象类
 * Class WebsocketServer
 * @package JoseChan\Swoole\Utils
 */
abstract class WebsocketServer extends AbstractServer
{
    /**
     * 创建websocket服务器对象
     * @param Listener $listener
     */
    protected function setServer(Listener $listener)
    {
        $this->server = new Server($listener->host(), $listener->port());
    }

    /**
     * tcp的消息回调，不用管
     * @param \Swoole\Server $server
     * @param int $fd
     * @param int $reactorId
     * @param string $data
     * @return mixed|void
     */
    protected function onReceive(\Swoole\Server $server, int $fd, int $reactorId, string $data)
    {
    }

    /**
     * websocket的消息回调
     * @param Server $server
     * @param Frame $frame
     * @return mixed
     */
    abstract protected function onMessage(Server $server, Frame $frame);
}
