@render('header')
@render('status')

<legend>Add User</legend>

{{ Form::open() }}
<fieldset>

  {{ Form::label('first_name', 'First Name' ) }}
  {{ Form::text('first_name', Input::old('first_name'), array('class' => 'input-large') ) }}

  {{ Form::label('last_name', 'Last Name') }}<br />
  {{ Form::text('last_name', Input::old('last_name'), array('class' => 'input-large') ) }}

  {{ Form::label('email', 'Email') }}
  {{ Form::text('email', Input::old('email'), array('class' => 'input-large') ) }}

  {{ Form::label('password', 'Password') }}
  {{ Form::password('password', array('class' => 'input-large') ) }}

  {{ Form::label('group_id', 'Group') }}
  {{ Form::select('group_id', $groups, Input::old('group_id')) }}

  {{ Form::button('Add User', array( 'class' => 'btn btn-medium btn-primary' )) }}

</fieldset>
{{ Form::close() }}

@render('footer')