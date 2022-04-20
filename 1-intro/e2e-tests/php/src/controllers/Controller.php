<?php

namespace controllers;

class Controller
{
    protected $_model;

    protected function _setModel($model) {
        $this->_model = $model;
    }

    protected function _getModel() {
        return $this->_model;
    }
}