<?php

class User extends Eloquent {

  public function ticket()
  {
    return $this->has_many('Ticket');
  }

  public function categories()
  {
    return $this->has_many_and_belongs_to('Category');
  }

  public static function get_user_tickets()
  {
    $q = DB::table('tickets')
    ->left_join('category_user', 'tickets.category_id', '=', 'category_user.category_id')
    ->left_join('users', 'category_user.user_id', '=', 'users.id')
    ->where('users.email', '=', Auth::user()->email)
    ->where('tickets.status', '=', 'open')
    ->get( 
      array(
        'tickets.id',
        'tickets.subject', 
        'tickets.description',
        'tickets.priority',
        'tickets.location',
        'tickets.status',
        'tickets.user_id',
        'tickets.created_at',
      ) 
    );

    return $q;
  }
}