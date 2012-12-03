<?php

class Ticket_Controller extends Base_Controller {

  public $restful = true;

  function __construct()
  {
    //
  }


  public function get_file()
  {
    print Form::open_for_files();
    print Form::file('file');
    print Form::submit('upload');
    print Form::close();
  }

  public function post_file()
  {
    print 'filename below<p>';


    $upload = Input::file('file');
    print '<pre>';

    print_r($upload);
    /*
    $path = path('storage').'tmp';
    $upload = Input::upload('file', $path, $upload['name']);
*/
    /*
    [name] => 0-1000-chinese-auction-numbers.docx
    [type] => application/vnd.openxmlformats-officedocument.wordprocessingml.document
    [tmp_name] => /private/var/tmp/phpaLeXu0
    [error] => 0
    [size] => 208768
    */

    $Upload_file = new Upload;
    $Upload_file->ticket_id = 1;
    $Upload_file->name = $upload['name'];
    $Upload_file->type = $upload['type'];
    $Upload_file->extension = File::extension( $upload['name'] );
    $Upload_file->contents = base64_encode( file_get_contents( $upload['tmp_name'] ) );
    $Upload_file->save();
  }

  public function get_index()
  {
    $data['tickets'] = Ticket::order_by('created_at', 'desc')->get();
    return View::make('ticket-dashboard', $data);
  }

  public function get_view($ticket_id)
  {
    $data['ticket'] = Ticket::find($ticket_id);
    $data['user'] = Ticket::user_who_added_ticket($ticket_id);
    $data['status'] = array('open' => 'open', 'closed' => 'closed');
    return View::make('ticket-detail', $data);
    $user = Ticket::user_who_added_ticket($ticket_id);
  }

  public function post_view($ticket_id)
  {
    $ticket = Ticket::find($ticket_id);
    $ticket->status = Input::get('status');
    $ticket->save();

    return Redirect::to('ticket/view/'.$ticket_id)->with('status', 'Ticket updated');
  }

  public function get_add()
  {
    $data['priority'] = array('low' => 'low', 'normal' => 'normal', 'high' => 'high !!');
    $categories = Category::order_by('name', 'asc')->lists('name', 'id');

    $placeholder = array('' => 'Choose...');
    $data['categories'] = $placeholder + Category::order_by('name', 'asc')->lists('name', 'id');

    return View::make('add.ticket', $data);
  }

  public function post_add()
  {
    Ticket::add_ticket();

    return Redirect::to('ticket/add')->with('status', 'Ticket added');
  }

  private function generate_salt()
  {
    mt_srand(microtime(true)*100000 + memory_get_usage(true));
    return md5(uniqid(mt_rand(), true));
  }
}