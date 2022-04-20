<?php

namespace models;

use Exception;

class MessageModel extends Model
{
    private $storage;

    public function __construct() {
        $this->storage = new \storage\MessageStorage();
    }

    public function setStorage($storage) {
        $this->storage = $storage;
    }

    public function getStorage() {
        return $this->storage;
    }

    public function findById($id) {
        return $this->storage->readEntity($id);
    }

    public function findAll() {
        return $this->storage->readAllEntities();
    }

    public function persist($entity) {
        $already_exist = $this->findById($entity->getId());
        if (!$already_exist) {
            try {
                # log write
                $this->storage->writeEntity($entity);
            } catch (Exception $e) {
                # log + display
                ;
            }
        } else {
            try {
                # log edit
                $this->storage->editEntity($entity->getId(), $entity);
            } catch (Exception $e) {
                # log + display
                ;
            }
        }
    }

    public function delete($entity) {
        $exist = $this->findById($entity->getId());
        if (!$exist) {
            return ;
        }
        try {
            # log delete
            $this->storage->deleteEntity($entity->getId());
        } catch (Exception $e) {
            # log + display
            ;
        }
    }
};

