@render('header')

<div class="container">

@render('status')
<fieldset>
<legend>Add Ticket</legend>

{{ Form::open_for_files('ticket/add', 'POST', array( 'class' => 'form-inline', 'id' => 'add-ticket' ) ) }}

  {{ Form::label('subject', 'Subject') }}
  {{ Form::text('subject', Input::old('subject')) }}
  
  {{ $errors->first('subject') }}


  {{ Form::label('location', 'Location') }}
  {{ Form::text('location', Input::old('location')) }}

  {{ $errors->first('location') }}

  {{ Form::label('category_id', 'Category') }}
  {{ Form::select( 'category_id', $categories, Input::old('category_id')   ) }}

  {{ $errors->first('category_id') }}

  {{ Form::label('description', 'Description') }}
  {{ Form::textarea('description', Input::old('description')) }}

  {{ $errors->first('description') }}

  {{ Form::label('file', 'Upload file') }}
  {{ Form::file('file') }}

  {{ Form::label('priority', 'Priority') }}
  {{ Form::select( 'priority', $priority, Input::old('priority', 'normal') ) }}

  <p>{{ Form::submit( 'Add Ticket', array( 'class' => 'btn btn-medium btn-primary' ) ) }}</p>

</fieldset>
{{ Form::close() }}
</div>

@render('footer')