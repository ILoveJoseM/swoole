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

abstract class WebsocketServer extends AbstractServer
{
    protected function setServer(Listener $listener)
    {
        $this->server = new Server($listener->host(), $listener->port());
    }

    protected function onReceive(\Swoole\Server $server, int $fd, int $reactorId, string $data)
    {
    }

    abstract protected function onMessage(Server $server, Frame $frame);
}
