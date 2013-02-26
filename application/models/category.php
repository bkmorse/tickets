<?php

class Category extends Eloquent {

  public function users()
  {
    return $this->has_many('User');
  }


}