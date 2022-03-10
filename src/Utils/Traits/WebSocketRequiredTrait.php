<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2022-02-21
 * Time: 19:32
 */

namespace JoseChan\Swoole\Utils\Traits;


use Swoole\WebSocket\Frame;
use Swoole\WebSocket\Server;

/**
 * websocket服务器必须实现的回调函数
 * Trait WebSocketRequiredTrait
 * @package JoseChan\Swoole\Utils\Traits
 */
trait WebSocketRequiredTrait
{
    /**
     * 接收消息
     * @param Server $server
     * @param Frame $frame
     */
    protected function onMessage(Server $server, Frame $frame){}
}
