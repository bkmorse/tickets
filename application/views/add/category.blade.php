@render('header')

<h1>Add Category</h1>

@render('status')

{{ Form::open() }}

<p>{{ Form::label('name', 'Name') }}<br />
{{ Form::text('name', Input::old('name')) }}

<p>Assign group: {{ Form::select( 'group_id', $groups, Input::old('group_id') ) }}</p>

<p>{{ Form::submit('Add Category') }}</p>

{{ Form::close() }}

@render('footer')