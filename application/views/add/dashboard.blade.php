@render('header')

<h1>Your Tickets</h1>

@render('status')

@foreach($tickets as $ticket)

<p>{{ HTML::link_to_action('ticket/view/'.$ticket->id, $ticket->subject) }}</p>

@endforeach


@render('footer')