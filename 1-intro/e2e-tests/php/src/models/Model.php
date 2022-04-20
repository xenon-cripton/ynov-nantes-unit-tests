<?php

namespace models;

abstract class Model
{
    protected $_storage;

    abstract protected function findById($id);
    abstract protected function findAll();
    abstract protected function persist($entity);
    abstract protected function delete($entity);
};

abstract class Entity
{
};