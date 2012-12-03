@render('header')

{{ Form::open() }}
<fieldset>
  <legend>{{ $group->name }}</legend>

  @render('status')
  
  {{ Form::label( 'name', 'Name' ) }}
  {{ Form::text( 'name', Input::old('name', $group->name) ) }}

  <p>{{ Form::submit('Update', array( 'class' => 'btn btn-medium btn-primary' ) ) }}
  {{ HTML::link('/group/delete/' . $group->id, 'Delete', array( 'class' => 'btn btn-medium btn-danger' ) ) }}
  {{ HTML::link('group', 'Cancel', array( 'class' => 'btn btn-medium btn-warning' ) ) }}</p>
</fieldset>
{{ Form::close() }}

@render('footer')