<?php

class Group extends Eloquent {

  public static function add_category_group($group_id)
  {
    $data = array(
      'category_id' =>  Input::get('category_id'),
      'group_id'    =>  $group_id  
    );

    DB::table('category_group')->insert($data);
  }

}