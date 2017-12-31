<?php

use Yaf\Controller_Abstract;

class IndexController extends Controller_Abstract
{

    private $imageModel;
    private $imagine;

    public function init()
    {
        Yaf\Dispatcher::getInstance()->disableView();
        $this->imageModel = new ImageModel();
        $this->imagine = new Imagine_Image();
    }

    public function indexAction()
    {
        //print_r($this->getRequest()->getParams());exit;
        $key = $this->getRequest()->getParam('key', '');
        $size = $this->getRequest()->getParam('size', '');
        $ext = $this->getRequest()->getParam('ext', '');
        $ret = $this->imageModel->get($this->imageModel->table(),['image_id', 'url'], ['image_id' => $key]);
        if (empty($ret)) {
            echo json_encode(['status' => 0, 'message' => '没有图片']);
        } else {
            $res = $this->imagine->createInset($ret['url'], $size, $ext);
            echo json_encode($res);
        }
    }
}