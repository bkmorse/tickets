<?php

class Category_Controller extends Base_Controller {

  public $restful = true;

  function __construct()
  {
    //
  }


  public function get_add()
  {
    $placeholder = array('' => 'Choose...');
    $data['groups'] = $placeholder + Group::order_by('name', 'asc')->lists('name', 'id');

    return View::make('add.category', $data);
  }

  public function post_add()
  {
    $Category = new Category;
    $Category->name = Input::get('name');
    $Category->save();

    return Redirect::to('category/add')->with('status', 'Category added');
  }

}