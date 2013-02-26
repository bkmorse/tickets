<?php

class TestTicket extends PHPUnit_Framework_TestCase {

  /**
   * Test that a given condition is met.
   *
   * @return void
   */
  public function testUserHasTickets()
  {
    $this->assertArrayHasKey( 'howdy', Ticket::array_value() );  
  }

  public function testExpectFooActualFoo()
  {
    $this->expectOutputString('chuck');
    print 'foo';
  }
}