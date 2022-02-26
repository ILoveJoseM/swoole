<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2022-02-14
 * Time: 16:27
 */

namespace JoseChan\Swoole\Utils;


use Swoole\Http\Request;
use Swoole\Http\Response;
use Swoole\Http\Server;

abstract class HttpServer extends AbstractServer
{

    protected function onReceive(\Swoole\Server $server, int $fd, int $reactorId, string $data)
    {
    }

    abstract protected function onRequest(Request $request, Response $response);


    protected function setServer(Listener $listener)
    {
        $this->server = new Server($listener->host(), $listener->port());
    }
}
