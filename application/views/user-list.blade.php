@render('header')
@render('status')

<h2>Users</h2>

<p>{{ HTML::link('/user/add', 'Add User', array( 'class' => 'btn btn-medium btn-primary' ) ) }}</p>

<table class="table table-bordered">
<thead>
  <th>Last name</th>
  <th>First name</th>
  <th>Email</th>
  <th>Admin</th>
  <th>Created</th>
  <th></th>
</thead>

<tbody>

@foreach( $users as $user )
<tr>
  <td>{{ $user->last_name }}</p>
  <td>{{ $user->first_name }}</p>
  <td>{{ $user->email }}</p>
  <td>@if($user->admin) <i class="icon-ok"></i> @endif</td>
  <td>{{ date('F j, Y', strtotime( $user->created_at ) ) }}
  <td>{{ HTMl::link('user/edit/' . $user->id, '', array('class' => 'icon-edit') ) }}</td>
</tr>
@endforeach

</tbody>
</table>

@render('footer')