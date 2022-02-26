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

trait WebSocketRequiredTrait
{
    protected function onMessage(Server $server, Frame $frame){}
}
