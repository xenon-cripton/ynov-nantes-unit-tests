<?php

namespace models;

class MessageEntity extends Entity
{
    protected $entity = null;
    /* attributes */
    protected $id;
    protected $user;
    protected $message;

    public function __construct() {
        $this->id = uniqid();
    }

    public function getId() : string {
        return $this->id;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function getUser() : string {
        return $this->user;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function getMessage() : string {
        return $this->message;
    }

    public function serialize() {
        return json_encode([
            'id' => $this->id,
            'user' => $this->user,
            'message' => $this->message
        ]);
    }
};