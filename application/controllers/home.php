<?php

class Home_Controller extends Base_Controller {

  public $restful = true;

	public function get_dashboard()
	{
		$data['tickets'] = User::get_user_tickets();
		return View::make('dashboard', $data);
	}

}