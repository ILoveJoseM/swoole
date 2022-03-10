<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2022-02-14
 * Time: 14:26
 */

namespace JoseChan\Swoole\Utils;

use Swoole\Server;

/**
 * 服务器抽象
 * Class AbstractServer
 * @package JoseChan\Swoole\Utils
 */
abstract class AbstractServer
{
    /** @var Server $server */
    protected $server;

    /** @var Options $options */
    protected $options;

    /** @var bool $is_boot 是否已启动 */
    protected $is_boot = false;

    /** @var Events $event */
    protected $event;

    /**
     * constructor.
     * @param Options $options
     * @param Listener $listener
     * @param Events $event
     */
    public function __construct(Options $options, Listener $listener, Events $event)
    {
        $this->setServer($listener);
        $this->options = $options;
        $this->event = $event;
    }

    /**
     * 创建服务器对象，不同服务可自行重写
     * @param Listener $listener
     */
    protected function setServer(Listener $listener)
    {
        $this->server = new Server($listener->host(), $listener->port());
    }

    /**
     * 开启服务
     * @throws \Exception
     */
    public function start()
    {
        if ($this->is_boot) {
            throw new \Exception("server is already start!");
        }
        $this->bindOptionsToServer();
        $this->handleEvent();
        $this->bindEventToServer();
        $this->server->start();

        $this->is_boot = true;
    }

    /**
     * 获取Event对象
     * @return Events
     * @throws \Exception
     */
    public function event()
    {
        if ($this->is_boot) {
            throw new \Exception("server has been start, can't operate any event know!");
        }

        return $this->event;
    }

    /**
     * 获取option对象
     * @return Options
     * @throws \Exception
     */
    public function options()
    {
        if ($this->is_boot) {
            throw new \Exception("server has been start, can't modify any options know!");
        }

        return $this->options;
    }

    /**
     * 接收事件，必须实现
     * @param Server $server
     * @param int $fd
     * @param int $reactorId
     * @param string $data
     * @return mixed
     */
    abstract protected function onReceive(Server $server, int $fd, int $reactorId, string $data);

    /**
     * 绑定事件到swoole服务器
     * @return $this
     */
    protected function bindEventToServer()
    {
        $this->event->map(function (\Closure $closure, $event) {
            $this->server->on($event, $closure);
        });

        return $this;
    }

    /**
     * 绑定配置到swoole服务器
     * @return $this
     */
    protected function bindOptionsToServer()
    {
        $this->server->set($this->options->toArray());

        return $this;
    }

    /**
     * 处理回调函数绑定
     * @return $this
     * @throws \Exception
     */
    protected function handleEvent()
    {
        $handles = get_class_methods($this);
        foreach ($handles as $value) {
            if ('on' == substr($value, 0, 2)) {
                $this->event()->addEvent(lcfirst(substr($value, 2)), \Closure::fromCallable([$this, $value]));
            }
        }
        return $this;
    }
}
