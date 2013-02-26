@render('header')
@render('status')

<legend>Add User</legend>

{{ Form::open() }}
<fieldset>
  <div class="control-group {{ $errors->has('first_name') ? 'error' : '' }}">
    {{ Form::label('first_name', 'First Name' ) }}
    {{ Form::text('first_name', Input::old('first_name'), array('class' => 'input-large') ) }}

    {{ $errors->first('first_name') }}
  </div>

  <div class="control-group {{ $errors->has('last_name') ? 'error' : '' }}">
    {{ Form::label('last_name', 'Last Name') }}<br />
    {{ Form::text('last_name', Input::old('last_name'), array('class' => 'input-large') ) }}

    {{ $errors->first('last_name') }}
  </div>

  <div class="control-group {{ $errors->has('email') ? 'error' : '' }}">
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', Input::old('email'), array('class' => 'input-large') ) }}

    {{ $errors->first('email') }}
  </div>

  <div class="control-group {{ $errors->has('password') ? 'error' : '' }}">
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', array('class' => 'input-large') ) }}

    {{ $errors->first('password') }}
  </div>

    {{ Form::checkbox('admin', 1, Input::old('admin')) }}
    {{ Form::label('admin', 'Admin') }}

  <div class="control-group {{ $errors->has('category_id') ? 'error' : '' }}">
    {{ Form::label('category_id', 'Categories') }}
    {{ Form::select('category_id[]', $categories, Input::old('category_id'), array( 'multiple' => 'multiple' ) ) }}

    {{ $errors->first('category_id') }}
  </div>

  <p>{{ Form::button('Add User', array( 'class' => 'btn btn-medium btn-primary' )) }}</p>

</fieldset>
{{ Form::close() }}

@render('footer')