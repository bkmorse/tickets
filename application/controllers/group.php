<?php

class Group_Controller extends Base_Controller {

  public $restful = true;

  /*
    users in group view tickets assigned to their group via category
    add 
  */

  public function get_add()
  {
    $placeholder = array('' => 'Choose...');
    $data['categories'] = $placeholder + Category::order_by('name', 'asc')->lists('name', 'id');
    return View::make('add.group', $data);
  }

  public function post_add()
  {
    $group = new Group;
    $group->name = Input::get('name');
    $group->save();

    Group::add_category_group($group->id);

    return Redirect::to('group/add')->with('status', 'Group added');
  }

}