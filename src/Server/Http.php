<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2022-02-21
 * Time: 19:56
 */

namespace JoseChan\Swoole\Server;


use JoseChan\Swoole\Utils\HttpServer;
use JoseChan\Swoole\Utils\Traits\HttpServerRequiredTrait;
use JoseChan\Swoole\Utils\Traits\ServerTrait;
use JoseChan\Swoole\Utils\Traits\TaskTrait;

/**
 * http服务器
 * Class Http
 * @package JoseChan\Swoole\Server
 */
class Http extends HttpServer
{
    use HttpServerRequiredTrait;
    use ServerTrait;
    use TaskTrait;
}
