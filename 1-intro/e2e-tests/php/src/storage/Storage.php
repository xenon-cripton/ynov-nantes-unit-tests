<?php

namespace storage;

abstract class Storage
{
    abstract public function writeEntity($entity);
    abstract public function readEntity($id);
    abstract public function editEntity($id, $entity);
    abstract public function deleteEntity($id);
    abstract public function readAllEntities();
};
