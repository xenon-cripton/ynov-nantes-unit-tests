<?php declare(strict_types=1);

require_once './src/router.php';

use PHPUnit\Framework\TestCase;

class MessengerControllerTest extends TestCase
{
    public function testIsInstanceOfController(): void
    {
        $this->assertInstanceOf(
            controllers\Controller::class,
            new controllers\MessengerController()
        );
    }

    public function test__index(): void
    {
        $router = new \Router();

        $router->setController("Messenger");
        $router->setAction("index");
        $router->setQuery_parameters(null);

        $answer = $router->load();
        $expected = array();
        foreach (array_filter(explode('\n', file_get_contents('messages.txt'))) as $line) {
            $entity = json_decode($line);
            $expected[$entity->id] = [
                'id' => $entity->id,
                'user' => $entity->user,
                'message' => $entity->message,
            ];
        }
        $expected = json_encode($expected);

        $this->assertEquals(
            $answer,
            $expected
        );
    }

    public function test__list(): void
    {
        $router = new \Router();

        $router->setController("Messenger");
        $router->setAction("list");
        $router->setQuery_parameters(null);

        $answer = $router->load();
        $expected = array();
        foreach (array_filter(explode('\n', file_get_contents('messages.txt'))) as $line) {
            $entity = json_decode($line);
            $expected[$entity->id] = [
                'id' => $entity->id,
                'user' => $entity->user,
                'message' => $entity->message,
            ];
        }
        $expected = json_encode($expected);

        $this->assertEquals(
            $answer,
            $expected
        );
    }

    public function test__create(): void
    {
        $router = new \Router();

        $router->setController("Messenger");
        $router->setAction("create");
        $router->setQuery_parameters("user=paul:message=hello world");

        $answer = $router->load();
        $expected = "{\"success\":true}";

        $this->assertEquals(
            $answer,
            $expected
        );
    }
}
