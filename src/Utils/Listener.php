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
    /** @var string $host 连接地址 */
    protected $host;
    /** @var int $port 端口号 */
    protected $port;
    /** @var int */
    protected $mode;
    /** @var bool 是否开启监听 */
    protected $is_listen = false;
    /** @var bool $is_default 是否默认监听 */
    protected $is_default = false;

    public function __construct($host, $port, $mode = 2, $is_default = false)
    {
        $this->host = $host;
        $this->port = $port;
        $this->mode = $mode;
        $this->is_default = $is_default;
    }

    /**
     * @return string
     */
    public function host()
    {
        return $this->host;
    }

    /**
     * @return int
     */
    public function port()
    {
        return $this->port;
    }

    /**
     * @return int
     */
    public function mode()
    {
        return $this->mode;
    }
}
