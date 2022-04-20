<?php

namespace storage;

class MessageStorage extends Storage {
    private $file = "messages.txt";
    private $entities = array();
    private $file_cache = null;

    public function writeEntity($entity) {
        $handle = fopen($this->file, 'a+');
        fwrite($handle, $entity->serialize() . '\n');
        fclose($handle);
        $this->_refresh_cache();
    }

    public function readEntity($id) {
        if (!$this->entities) {
            $this->_refresh_cache();
        }
        if (array_key_exists($id, $this->entities)) {
            return $this->entities[$id];
        }
        return null;
    }

    public function deleteEntity($id) {
        if (!$this->readEntity($id)) {
            throw new \Exception('Entity not found.');
        }
        unset($this->entities[$id]);
        $this->_write_file();
    }

    public function deleteAllEntities() {
        $this->entities = [];
        $this->_write_file();
    }

    public function editEntity($id, $entity) {
        if (!$this->readEntity($id)) {
            throw new \Exception('Entity not found.');
        }
        $this->entities[$id] = $entity;
        $this->_write_file();
    }

    public function readAllEntities() {
        if (!$this->entities) {
            $this->_refresh_cache();
        }
        return $this->entities;
    }

    private function _refresh_cache() {
        $file_data = $this->_read_file();
        $this->entities = array();
        foreach($file_data as $line) {
            $entity = json_decode($line, true);
            $this->entities[$entity['id']] = $entity;
        }
    }

    private function _read_file() {
        if (!file_exists($this->file)) {
            return array();
        }
        # bad practice to store a whole file in ram
        $file_content = file_get_contents($this->file);
        return array_filter(explode('\n', $file_content));
    }

    private function _write_file() {
        $file_content = "";
        foreach($this->entities as $entity) {
            $file_content .= json_encode($entity) + '\n';
        }
        file_put_contents($this->file, $file_content);
    }
};