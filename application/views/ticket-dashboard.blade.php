@render('header')
@render('status')

<h2>Your Tickets</h2>

<p>{{ HTML::link('/ticket/add', 'Add Ticket', array( 'class' => 'btn btn-medium btn-primary' ) ) }}</p>

<table class="table table-bordered">
<thead>
  <th>Subject</th>
  <th>Description</th>
  <th>Status</th>
  <th>Priority</th>
  <th>Date</th>
  <th></th>
</thead>

<tbody>

@foreach( $tickets as $ticket )
<tr>
  <td>{{ HTML::link_to_action( 'ticket/edit/'.$ticket->id, $ticket->subject ) }}</p>
  <td>{{ Str::words( $ticket->description, 15 ) }}</td>
  <td>{{ $ticket->status }}</td>
  <td>
  @if( $ticket->priority == "high" )
  <span class="label label-important">{{ $ticket->priority }}</span>
  @else
    {{ $ticket->priority }}
  @endif
  </td>
  <td>{{ date( "m/j/Y g:ma", strtotime( $ticket->created_at ) ) }}</td>
  <td>{{ HTMl::link('ticket/edit/' . $ticket->id, '', array('class' => 'icon-edit') ) }}</td>
</tr>
@endforeach

</tbody>
</table>

@render('footer')