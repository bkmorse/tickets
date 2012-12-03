@render('header')

<h1>Add Category</h1>

@render('status')

{{ Form::open() }}

<p>{{ Form::label('name', 'Name') }}<br />
{{ Form::text('name', Input::old('name')) }}

<p>Assign group: {{ Form::select( 'group_id', $groups, Input::old('group_id') ) }}</p>

  <p>{{ Form::submit('Add Category', array( 'class' => 'btn btn-medium btn-primary' ) ) }}</p>

{{ Form::close() }}

@render('footer')