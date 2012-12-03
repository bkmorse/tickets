@render('header')

<h1>Add Group</h1>

@render('status')

{{ Form::open() }}

<p>{{ Form::label('name', 'Name') }}<br />
{{ Form::text('name', Input::old('name')) }}

<p>Assign category: {{ Form::select( 'category_id', $categories, Input::old('category_id') ) }}</p>

<p>{{ Form::submit('Add Group') }}</p>

{{ Form::close() }}

@render('footer')