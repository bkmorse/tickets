<?php

class User extends Eloquent {

  public function ticket()
  {
    return $this->has_many('Ticket');
  }

}