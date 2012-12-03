@if( Auth::check() )

<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="#">Tickets</a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li class="active"><a href="/">Home</a></li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tickets<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>{{ HTML::link_to_action( 'ticket/add', 'Add' ) }}</li>
              <li>{{ HTML::link_to_action( 'ticket/index', 'List all' ) }}</li>
              <li class="divider"></li>
              <li class="nav-header">Nav header</li>
              <li><a href="#">Separated link</a></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li>

          @if( Session::get('is_admin') )

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>{{ HTML::link_to_action( 'user/add', 'Add' ) }}</li>
                <li>{{ HTML::link_to_action( 'user/index', 'List all' ) }}</li>
                <li class="divider"></li>
                <li class="nav-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Groups<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>{{ HTML::link_to_action( 'group/add', 'Add' ) }}</li>
                <li>{{ HTML::link_to_action( 'group', 'List all' ) }}</li>
                <li class="divider"></li>
                <li class="nav-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Category<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>{{ HTML::link_to_action( 'category/add', 'Add' ) }}</li>
                <li>{{ HTML::link_to_action( 'category', 'List all' ) }}</li>
                <li class="divider"></li>
                <li class="nav-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          @endif

        </ul>
        
        @if( Auth::check() )
          <a href="/logout" class="btn btn-primary btn-small" id="logout">Logout</a>
        @endif
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>

@endif