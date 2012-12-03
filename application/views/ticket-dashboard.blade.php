@render('header')

@render('status')

@foreach( $tickets as $ticket )

  <p>{{ HTML::link_to_action( 'ticket/view/'.$ticket->id, $ticket->subject . ' - ' . $ticket->created_at ) }}</p>
  
@endforeach

@render('footer')