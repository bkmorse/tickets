@render('header')

<h1>Your Tickets</h1>

@render('status')

<table class="table table-striped">
<thead>
<tr>
  <th>Subject</th>
  <th>Description</th>
  <th>Added</th>
  <th>Priority</th>
  <th>Status</th>
  <th></th>
</tr>
<tbody>

@foreach($tickets as $ticket)
<tr>
  <td>{{ $ticket->subject }}</td>
  <td>{{ Str::words( $ticket->description, 10 ) }}</td>
  <td>{{ date("M j, Y", strtotime( $ticket->created_at ) ) }}</td>
  <td>{{ $ticket->status }}</td>
  <td>{{ $ticket->priority }}</td>
  <td>{{ HTML::link( 'ticket/view/' . $ticket->id, '', array( 'class' => 'icon-edit' ) ) }}</td>
</tr>
@endforeach
</tbody>
</table>

@render('footer')