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

/**
 * http服务器抽象，实现http服务器需要继承
 * Class HttpServer
 * @package JoseChan\Swoole\Utils
 */
abstract class HttpServer extends AbstractServer
{

    /**
     * tcp的接收消息，不用管
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
     * 接收消息
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    abstract protected function onRequest(Request $request, Response $response);

    /**
     * 创建服务器对象
     * @param Listener $listener
     */
    protected function setServer(Listener $listener)
    {
        $this->server = new Server($listener->host(), $listener->port());
    }
}
