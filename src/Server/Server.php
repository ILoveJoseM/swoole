<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2022-02-14
 * Time: 15:37
 */

namespace JoseChan\Swoole\Server;


use JoseChan\Swoole\Utils\AbstractServer;
use JoseChan\Swoole\Utils\Traits\ServerRequiredTrait;
use JoseChan\Swoole\Utils\Traits\ServerTrait;
use JoseChan\Swoole\Utils\Traits\TaskTrait;

/**
 * tcp服务器
 * Class Server
 * @package JoseChan\Swoole\Server
 */
class Server extends AbstractServer
{
    use ServerRequiredTrait;
    use ServerTrait;
    use TaskTrait;
}
