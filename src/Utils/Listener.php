<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2020-04-23
 * Time: 17:04
 */

namespace JoseChan\Swoole\Utils;

/**
 * 监听的端口
 * Class Listener
 * @package JoseChan\Websocket
 */
class Listener
{
    protected $host;
    protected $port;
    protected $mode;
    protected $is_listen = false;
    protected $is_default = false;

    public function __construct($host, $port, $mode = 2, $is_default = false)
    {
        $this->host = $host;
        $this->port = $port;
        $this->mode = $mode;
        $this->is_default = $is_default;
    }

    public function host()
    {
        return $this->host;
    }

    public function port()
    {
        return $this->port;
    }

    public function mode()
    {
        return $this->mode;
    }
}
