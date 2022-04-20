<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class MessageModelTest extends TestCase
{
    public function test__persist(): void {
        $model = new \models\MessageModel();

        $entity = new \models\MessageEntity();
        $username = 'myself';
        $message = 'my important message.';
        $entity->setUser($username);
        $entity->setMessage($message);

        $model->persist($entity);

        $this->assertEquals(
            json_encode($model->getStorage()->readEntity($entity->getId())),
            $entity->serialize()
        );
    }

    public function test__findById(): void {
        $model = new \models\MessageModel();

        $entity = new \models\MessageEntity();
        $username = 'myself';
        $message = 'my important message.';
        $entity->setUser($username);
        $entity->setMessage($message);

        $model->persist($entity);

        $this->assertEquals(
            json_encode($model->findById($entity->getId())),
            $entity->serialize()
        );
    }
    public function test__findAll(): void {
        $model = new \models\MessageModel();
        $model->getStorage()->deleteAllEntities();

        $entity = new \models\MessageEntity();
        $username = 'myself';
        $message = 'my important message.';
        $entity->setUser($username);
        $entity->setMessage($message);

        $model->persist($entity);

        $this->assertEquals(
            json_encode($model->findAll()),
            json_encode([$entity->getId() => json_decode($entity->serialize())])
        );
    }

    public function test__delete(): void {
        $model = new \models\MessageModel();

        $entity = new \models\MessageEntity();
        $username = 'myself';
        $message = 'my important message.';
        $entity->setUser($username);
        $entity->setMessage($message);

        $model->persist($entity);

        $this->assertEquals(
            json_encode($model->findById($entity->getId())),
            $entity->serialize()
        );

        $model->delete($entity);

        $this->assertEquals(
            $model->findById($entity->getId()),
            null
        );
    }
}
