<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2020-04-23
 * Time: 22:55
 */

namespace JoseChan\Swoole\Providers;

use Illuminate\Support\ServiceProvider;
use JoseChan\Swoole\Utils\Listener;
use JoseChan\Swoole\Utils\Options;

/**
 * Class ServerProvider
 * @package JoseChan\Swoole\Providers
 */
class ServerProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([__DIR__ . '/../../config/server.php' => config_path("server.php")], "swoole-server");
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $config = config("server");

        if(!$config){
            $config = include __DIR__.'/../../config/server.php';
        }

        $this->app->when(Options::class)
            ->needs('$options')
            ->give(isset($config['options']) ? $config['options'] : []);

        $this->app->when(Listener::class)
            ->needs('$host')
            ->give(isset($config['listener']['host']) ? $config['listener']['host'] : "127.0.0.1");

        $this->app->when(Listener::class)
            ->needs('$port')
            ->give(isset($config['listener']['port']) ? $config['listener']['port'] : "9001");
    }
}
