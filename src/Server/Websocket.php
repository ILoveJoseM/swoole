<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2020-04-22
 * Time: 22:26
 */

namespace JoseChan\Swoole;

use JoseChan\Swoole\Utils\Traits\ServerTrait;
use JoseChan\Swoole\Utils\Traits\TaskTrait;
use JoseChan\Swoole\Utils\Traits\WebSocketRequiredTrait;
use JoseChan\Swoole\Utils\WebsocketServer;
use Swoole\Server;

class Websocket extends WebsocketServer
{
    use WebSocketRequiredTrait;
    use ServerTrait;
    use TaskTrait;
}
