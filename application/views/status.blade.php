@if( Session::get('status') )
  <div class="text-info">
    {{ Session::get('status') }}
  </div>
@endif