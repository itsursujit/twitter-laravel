<table class="table table-responsive" id="inventories-table">
    <thead>
        <th>Id</th>
        <th>Material Id</th>
        <th>Quantity</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($inventories as $inventory)
        <tr>
            <td>{!! $inventory->id !!}</td>
            <td>{!! $inventory->material_id !!}</td>
            <td>{!! $inventory->quantity !!}</td>
            <td>
                {!! Form::open(['route' => ['inventories.destroy', $inventory->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('inventories.show', [$inventory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('inventories.edit', [$inventory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
