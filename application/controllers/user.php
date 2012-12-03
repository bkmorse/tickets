<?php

class User_Controller extends Base_Controller {

  public $restful = true;

  function __construct()
  {
    //
  }

  /*
    TO-DO

    user ticket detail view, to delete ticket
    password reset
    account setup - admin enters user email, it auto sends email to invite them to enter password and their name
  */

  public function get_ticket($user_id)
  {
    $data['tickets'] = User::find($user_id)->ticket()->get();
    return View::make('user-tickets', $data);
  }

  public function get_add()
  {
    $placeholder = array('' => 'Choose...');
    $data['groups'] = $placeholder + Group::order_by('name', 'asc')->lists('name', 'id');

    return View::make('add.user', $data);
  }

  public function post_add()
  {
    $subsalt = 12301980;
    $salt = $this->generate_salt();

    $User = new User;
    $User->first_name = Input::get('first_name');
    $User->last_name = Input::get('last_name');
    $User->email = Input::get('email');
    $User->password = Hash::make( $subsalt . $salt . Input::get('password') );
    $User->salt = $salt;
    $User->group_id = Input::get('group_id');
    $User->save();

    return Redirect::to('user/add')->with('status', 'User added');
  }

  private function generate_salt()
  {
    mt_srand(microtime(true)*100000 + memory_get_usage(true));
    return md5(uniqid(mt_rand(), true));
  }
}