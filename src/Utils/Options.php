<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2020-04-23
 * Time: 11:42
 */

namespace JoseChan\Swoole\Utils;

/**
 * Class Options
 * @package JoseChan\Websocket
 * @property integer $reactor_num 主进程事件处理线程数
 * @property integer $worker_num 启动的worker进程数
 * @property integer $max_request 一个worker最大处理任务数，0为无限
 * @property integer $max_conn (max_connection) 最大维持的tcp连接数，默认为系统底层unlimit -n的值
 * @property integer $task_worker_num
 * @property integer $task_ipc_mode
 * @property integer $task_max_request
 * @property string $task_tmpdir
 * @property integer $task_enable_coroutine
 * @property integer $task_use_object
 * @property integer $dispatch_mode 分包策略
 * @property \Closure $dispatch_func 自定义的分包策略，默认为固定模式
 * @property integer $message_queue_key
 * @property integer $daemonize 守护进程模式 默认0，1为开启守护进程模式
 * @property integer $backlog
 * @property string $log_file 指定swoole错误日志文件， 默认将输出丢弃
 * @property integer $log_level
 * @property integer $heartbeat_check_interval 心跳检测，单位为秒
 * @property integer $heartbeat_idle_time 多久没发送数据自动断连
 * @property integer $open_eof_check
 * @property integer $open_eof_split
 * @property integer $package_eof
 * @property integer $open_length_check
 * @property integer $package_length_type
 * @property integer $package_length_func
 * @property integer $package_max_length
 * @property integer $open_cpu_affinity
 * @property integer $cpu_affinity_ignore
 * @property integer $open_tcp_nodelay
 * @property integer $tcp_defer_accept
 * @property integer $ssl_cert_file
 * @property integer $ssl_method
 * @property integer $ssl_ciphers
 * @property integer $user
 * @property integer $group
 * @property integer $chroot
 * @property integer $pid_file
 * @property integer $pipe_buffer_size
 * @property integer $buffer_output_size
 * @property integer $socket_buffer_size
 * @property integer $enable_unsafe_event
 * @property integer $discard_timeout_request
 * @property integer $enable_reuse_port
 * @property integer $enable_delay_receive
 * @property integer $open_http_protocol
 * @property integer $open_http2_protocol
 * @property integer $open_websocket_protocol
 * @property integer $open_mqtt_protocol
 * @property integer $open_websocket_close_frame
 * @property integer $reload_async
 * @property integer $tcp_fastopen
 * @property integer $request_slowlog_file
 * @property integer $enable_coroutine
 * @property integer $max_coroutine
 * @property integer $ssl_verify_peer
 * @property integer $max_wait_time
 */
class Options implements \ArrayAccess
{

    protected $fillable = [
        'reactor_num',
        'worker_num',
        'max_request',
        'max_conn',
        'task_worker_num',
        'task_ipc_mode',
        'task_max_request',
        'task_tmpdir',
        'task_enable_coroutine',
        'task_use_object',
        'dispatch_mode',
        'dispatch_func',
        'message_queue_key',
        'daemonize',
        'backlog',
        'log_file',
        'log_level',
        'heartbeat_check_interval',
        'heartbeat_idle_time',
        'open_eof_check',
        'open_eof_split',
        'package_eof',
        'open_length_check',
        'package_length_type',
        'package_length_func',
        'package_max_length',
        'open_cpu_affinity',
        'cpu_affinity_ignore',
        'open_tcp_nodelay',
        'tcp_defer_accept',
        'ssl_cert_file',
        'ssl_method',
        'ssl_ciphers',
        'user',
        'group',
        'chroot',
        'pid_file',
        'pipe_buffer_size',
        'buffer_output_size',
        'socket_buffer_size',
        'enable_unsafe_event',
        'discard_timeout_request',
        'enable_reuse_port',
        'enable_delay_receive',
        'open_http_protocol',
        'open_http2_protocol',
        'open_websocket_protocol',
        'open_mqtt_protocol',
        'open_websocket_close_frame',
        'reload_async',
        'tcp_fastopen',
        'request_slowlog_file',
        'enable_coroutine',
        'max_coroutine',
        'ssl_verify_peer',
        'max_wait_time',

    ];

    protected $options = [];

    /**
     * Options constructor.
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->options = array_filter($options, function ($k) {
            return in_array($k, $this->fillable);
        }, ARRAY_FILTER_USE_KEY);
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->options[$offset]);
    }

    /**
     * @param mixed $offset
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return isset($this->options[$offset]) ? $this->options[$offset] : null;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     * @return $this
     * @throws \Exception
     */
    public function offsetSet($offset, $value)
    {
        if (in_array($offset, $this->fillable)) {
            $this->options[$offset] = $value;
        } else {
            throw new \Exception("option [{$offset}] not fillable");
        }

        return $this;
    }

    public function offsetUnset($offset)
    {
        if (isset($this->options[$offset])) {
            unset($this->options[$offset]);
        }
    }

    /**
     * @param $name
     * @param $value
     * @return Options
     * @throws \Exception
     */
    public function __set($name, $value)
    {
        return $this->offsetSet($name, $value);
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->options[$name]);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->options;
    }
}
