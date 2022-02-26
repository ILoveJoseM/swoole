<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2020-04-23
 * Time: 18:10
 */

namespace JoseChan\Swoole\Utils;

/**
 * Class Events
 * @package JoseChan\Websocket
 * @method Events start(\Closure $closure)          服务启动事件 $closure = function(Swoole\Server $server){}
 * @method Events shutdown(\Closure $closure)       服务关闭事件 $closure = function(Swoole\Server $server){}
 * @method Events workerStart(\Closure $closure)    $closure = function(Swoole\Server $server, int $worker_id){}
 * @method Events workerExit(\Closure $closure)     $closure = function(Swoole\Server $server, int $worker_id){}
 * @method Events connect(\Closure $closure)        链接进入事件 $closure = function(Swoole\Server $server, int $fd, int $reactorId){}
 * @method Events receive(\Closure $closure)        接收数据事件 $closure = function (Swoole\Server $server, int $fd, int $reactor_id, string $data);
 * @method Events packet(\Closure $closure)         $closure(Swoole\Server $server);
 * @method Events close(\Closure $closure)          链接关闭事件 $closure = function(Swoole\Server $server, int $fd, int $reactorId){}
 * @method Events task(\Closure $closure)           $closure(Swoole\Server $server);
 * @method Events finish(\Closure $closure)         $closure(Swoole\Server $server);
 * @method Events pipeMessage(\Closure $closure)    $closure(Swoole\Server $server);
 * @method Events workerStop(\Closure $closure)     $closure = function(Swoole\Server $server, int $worker_id){}
 * @method Events workerError(\Closure $closure)    $closure = function(Swoole\Server $server, int $worker_id, int $worker_pid, int $exit_code, int $signal){}
 * @method Events managerStart(\Closure $closure)   $closure(Swoole\Server $server);
 * @method Events managerStop(\Closure $closure)    $closure(Swoole\Server $server);
 * @method Events message(\Closure $closure)        websocket服务专属的事件，必须被设置 $closure = function(Swoole\WebSocket\Server $server, Swoole\WebSocket\Frame $frame);
 */
class Events
{
    /** @var array $listenerable 可监听的事件列表 */
    protected $listenable = [
        "start",
        "shutdown",
        "workerStart",
        "workerStop",
        "workerExit",
        "connect",
        "receive",
        "packet",
        "close",
        "task",
        "finish",
        "pipeMessage",
        "workerError",
        "managerStart",
        "managerStop",
        "beforeReload",
        "afterReload",
        "message",
        "request"
    ];

    protected $events = [];

    /**
     * 添加事件监听
     * @param $event
     * @param \Closure $closure
     * @return $this
     * @throws \Exception
     */
    public function addEvent($event, \Closure $closure)
    {
        if (!in_array(lcfirst($event), $this->listenable)) {
            throw new \Exception("event [{$event}] not listenable");
        }

        $event = lcfirst($event);

        $this->events[$event] = $closure;

        return $this;
    }

    public function map(\Closure $closure)
    {
        foreach ($this->events as $key => $value){
            $closure($value, $key);
        }
    }

    /**
     * @param $name
     * @param $arguments
     * @return Events
     * @throws \Exception
     */
    public function __call($name, $arguments)
    {
        return $this->addEvent($name, ...$arguments);
    }
}
