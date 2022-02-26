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

trait HttpServerRequiredTrait
{
    protected function onRequest(Request $request, Response $response)
    {

    }
}
