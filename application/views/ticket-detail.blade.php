@render('header')
@render('status')

{{ Form::open() }}
<fieldset>
  <legend>{{ $ticket->subject }}</legend>

  <p>Location: {{ $ticket->location }}</p>

  <p>{{ $ticket->description }}</p>

  <p>Priority: {{ $ticket->priority }}</p>

  <p>Status: {{ Form::select( 'status', $status, Input::old('status', $ticket->status) ) }}</p>

  <p>Submitted by: {{ $user->first_name }} {{ $user->last_name }} on {{ date( "M j, Y g:m:i a", strtotime( $ticket->created_at ) ) }}</p>

  <p>{{ Form::submit('Update ticket',  array( 'class' => 'btn btn-medium btn-primary' ) ) }}</p>

</fieldset>
{{ Form::close() }}

@render('footer')