<?php

use PHPUnit\Framework\TestCase;

require_once('./src/flatten.php');

class FlattenTest extends TestCase
{
    public function test_empty_array()
    {
        $this->assertEmpty(flatten([]));
    }
    public function test_insert()
    {
        $this->assertIsArray(flatten([7]));
        $this->assertIsArray(flatten([7, [77], 7]));
    }
    public function test_multiple_array()
    {
        $this->assertEquals(flatten([[77], 1, 1, [7,7]]), [77,1,1,7,7], "Should be [77,1,1,7,7]");
    }
}