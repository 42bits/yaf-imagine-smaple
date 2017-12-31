<?php

use Yaf\Controller_Abstract;

class ErrorController extends Controller_Abstract
{
    public function errorAction()
    {
        $exception = $this->getRequest()->getException();
        $this->getView()->assign('message', $exception->getMessage());
    }
}