@render('header')
@render('status')

<legend>Add User</legend>

{{ Form::open() }}
<fieldset>
  <div class="control-group {{ $errors->has('first_name') ? 'error' : '' }}">
    {{ Form::label('category_id', 'Categories') }}
    {{ Form::select('category_id[]', array('1' => 'howdy', '2' => 'dowdy') , Input::old('category_id'), array( 'multiple' => 'multiple' ) ) }}
  </div>

  <p>{{ Form::button('Add User', array( 'class' => 'btn btn-medium btn-primary' )) }}</p>

</fieldset>
{{ Form::close() }}

@render('footer')