<?php

use Yaf\Controller_Abstract;

class IndexController extends Controller_Abstract
{

    public function indexAction()
    {
        $this->getView()->assign("content", "hello world");
    }

    public function testAction()
    {
        $thumb = new Imagick();
        $ReadFile = APP_PATH . '/public/img/24fde0385461af47db2c45560709e731.webp';
        $WriteFile = APP_PATH . '/public/img/24fde0385461af47db2c45560709e731.jpg';;
        $thumb->readImage($ReadFile);
        $thumb->writeImage($WriteFile);
        $thumb->clear();
        $thumb->destroy();
        exit;
    }
}