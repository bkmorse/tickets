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

  public function categories()
  {
    return $this->has_many_and_belongs_to('Category');
  }

  public static function get_groups()
  {
    return DB::table('groups')
    ->left_join('category_group', 'groups.id', '=', 'category_group.group_id')
    ->left_join('categories', 'category_group.category_id', '=', 'categories.id')
    ->order_by('groups.name', 'asc')
    ->get( array('groups.name as name', 'groups.id', 'categories.name as category_name', 'categories.id as category_id') );
  }

}
