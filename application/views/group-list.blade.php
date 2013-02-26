@render('header')
@render('status')

<h2>Groups</h2>

<p>{{ HTML::link('/group/add', 'Add Group', array( 'class' => 'btn btn-medium btn-primary' ) ) }}</p>

<table class="table table-bordered">
<thead>
  <th>Group</th>
  <th>Category</th>
</thead>

<tbody>
@foreach( $groups as $group )
<tr>
  <td>{{ HTML::link_to_action('group/edit/' . $group->id, $group->name) }}</td>
  <td>
    <!--{{ Form::select('category_id', $categories, Input::old('category_id', $group->category_id) ) }}-->
    {{ $group->category_name }}
  </td>

</tr>
@endforeach
</tbody>
</table>

@render('footer')