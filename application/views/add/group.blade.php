@render('header')

<h1>Add Group</h1>

@render('status')

{{ Form::open() }}

  {{ Form::label('name', 'Name') }}
  {{ Form::text('name', Input::old('name')) }}

  {{ Form::label('category_id', 'Assign category:') }}
  {{ Form::select( 'category_id', $categories, Input::old('category_id') ) }}

  <p>{{ Form::submit('Add Group', array( 'class' => 'btn btn-medium btn-primary' ) ) }}
    {{ HTML::link('group', 'Cancel', array( 'class' => 'btn btn-medium btn-warning' ) ) }}</p>

  </p>

{{ Form::close() }}

@render('footer')