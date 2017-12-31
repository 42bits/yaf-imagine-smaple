<?php

use Yaf\Bootstrap_Abstract;
use Yaf\Dispatcher;
use Yaf\Loader;

class Bootstrap extends Bootstrap_Abstract
{

    public function _initConfig()
    {
        $config = Yaf\Application::app()->getConfig();
        Yaf\Registry::set('config', $config);
    }

    /**
     * @param Dispatcher $dispatcher
     */
    public function _initRoute(Dispatcher $dispatcher)
    {
        $route = $dispatcher->getRouter();
        $route->addConfig(Yaf\Registry::get("config")->routes);
    }

    /**
     * @param Dispatcher $dispatcher
     */
    public function _initAutoload(Dispatcher $dispatcher)
    {
        $autoload = APP_PATH . '/vendor/autoload.php';
        if (is_file($autoload)) {
            Loader::import($autoload);
        }
    }

}