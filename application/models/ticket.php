<?php

class Ticket extends Eloquent {

  public function user()
  {
    return $this->has_one('User');
  }

  public static function add_ticket()
  {
    $Ticket = new Ticket;
    $Ticket->subject = Input::get('subject');
    $Ticket->description = Input::get('description');
    $Ticket->location = Input::get('location');
    $Ticket->priority = Input::get('priority');
    $Ticket->user_id = Session::get('user_id');
    $Ticket->category_id = Input::get('category_id');
    $Ticket->save();

    Ticket::upload_file($Ticket->id);
  }

  public static function upload_file($ticket_id)
  {
    $upload = Input::file('file');
    $Upload_file = new Upload;
    $Upload_file->ticket_id = $ticket_id;
    $Upload_file->name = $upload['name'];
    $Upload_file->type = $upload['type'];
    $Upload_file->extension = File::extension( $upload['name'] );
    $Upload_file->contents = base64_encode( file_get_contents( $upload['tmp_name'] ) );
    $Upload_file->save();
  }

  public static function user_who_added_ticket($ticket_id)
  {
    return DB::table('users')
    ->left_join('tickets', 'users.id', '=', 'tickets.user_id')
    ->where('tickets.id', '=', $ticket_id)
    ->first();
  }

}