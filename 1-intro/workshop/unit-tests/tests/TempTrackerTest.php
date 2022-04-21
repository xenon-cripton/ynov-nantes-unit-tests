<?php

use PHPUnit\Framework\TestCase;

require_once('./src/TempTracker.php');

class TempTrackerTest extends TestCase {
    public function test_empty() {
        $tempTracker = new TempTracker();
        $this->assertEmpty($tempTracker->get_temps());
    }
    
    public function test_return_value_inserted() {
        $tempTracker = new TempTracker();
        $tempTracker->insert(76);
        $this->assertContains(76, $tempTracker->get_temps());
    }
    
    public function test_min() {
        $tempTracker = new TempTracker();
        $tempTracker->insert(15);
        $tempTracker->insert(78);
        $tempTracker->insert(34);
        $this->assertEquals(15,$tempTracker->get_min());
    }

    public function test_max() {
        $tempTracker = new TempTracker();
        $tempTracker->insert(15);
        $tempTracker->insert(78);
        $tempTracker->insert(34);
        $this->assertEquals(78,$tempTracker->get_max());
    }

}
