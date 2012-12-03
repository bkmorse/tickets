@render('header')

    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>

<div class="container-fluid">

{{ Form::open( 'login', 'POST', array('class' => 'form-signin') ) }}

<h2 class="form-signin-heading">Please sign in</h2>

@if (Session::has('login_errors'))
  <p class="text-error">Username or password incorrect</p>
@endif

<?=$errors->first('username', '<p class="text-error">:message</p>')?>

<p>{{ Form::text( 'username', Input::old('username'), array( 'class' => 'input-block-level', 'placeholder' => 'Email address' ) ) }}

  {{ $errors->first('username') }}
</p>

<?=$errors->first('password', '<p class="text-error">:message</p>')?>

<p>{{ Form::password('password', array( 'class' => 'input-block-level', 'placeholder' => 'Password' )) }}

  {{ $errors->first('password') }}
</p>

<p>{{ Form::submit('Sign in', array( 'class' => 'btn btn-medium btn-primary' ) ) }}</p>

@render('status')

{{ Form::close() }}

</div>

@render('footer')