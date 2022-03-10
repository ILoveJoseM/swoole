<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2022-02-21
 * Time: 19:45
 */

namespace JoseChan\Swoole\Utils\Traits;


use Swoole\Http\Request;
use Swoole\Http\Response;

/**
 * http服务器必须实现的回调函数
 * Trait HttpServerRequiredTrait
 * @package JoseChan\Swoole\Utils\Traits
 */
trait HttpServerRequiredTrait
{
    /**
     * 接收http请求
     * @param Request $request
     * @param Response $response
     */
    protected function onRequest(Request $request, Response $response)
    {

    }
}
