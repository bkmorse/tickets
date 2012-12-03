<?php

class Group_Controller extends Base_Controller {

  public $restful = true;

  /*
    users in group view tickets assigned to their group via category
    add 
  */

  public function get_index()
  {
    $data['groups'] = Group::get_groups();
    //$data['groups'] = Group::order_by('name', 'asc')->get();
    //print '<pre>';

    $placeholder = array('' => 'Choose...');
    $data['categories'] = $placeholder + Category::order_by('name', 'asc')->lists('name', 'id');

    //print_r( $data['groups'] );

    return View::make('group-list', $data);
  }

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

    return Redirect::to('group')->with('status', 'Group added');
  }

  public function get_edit($group_id)
  {
    $data['group'] = Group::find($group_id);

    return View::make('group-detail', $data);
  }

  public function post_edit($group_id)
  {
    $group = Group::find($group_id);
    $group->name = Input::get('name');
    $group->save();

    return Redirect::to('group/edit/' . $group_id)->with('status', 'Group updated');
  }

  public function get_delete($group_id)
  {
    $group = Group::find($group_id);
    $group->delete();

    return Redirect::to('group')->with('status', 'Group deleted');
  }


}