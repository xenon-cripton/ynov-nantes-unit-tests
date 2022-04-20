<?php

namespace controllers;

class MessengerController extends Controller
{
    public function __construct() {
        $this->_setModel(new \models\MessageModel());
    }

    public function index() {
        return $this->list();
    }

    public function list() {
        $model = $this->_getModel();
        $entities = $model->findAll();
        return json_encode($entities);
    }

    public function create($parameters) {
        $model = $this->_getModel();

        if (!array_key_exists('user', $parameters) || !array_key_exists('message', $parameters)) {
            return json_encode(['error' => 'missing parameters']);
        }

        $entity = new \models\MessageEntity();
        $entity->setUser($parameters['user']);
        $entity->setMessage($parameters['message']);
        $model->persist($entity);

        return json_encode(['success' => true]);
    }
};