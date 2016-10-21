<table class="table table-responsive" id="shops-table">
    <thead>
        <th>Id</th>
        <th>Shop Name</th>
        <th>Code</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Note</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($shops as $shop)
        <tr>
            <td>{!! $shop->id !!}</td>
            <td>{!! $shop->shop_name !!}</td>
            <td>{!! $shop->code !!}</td>
            <td>{!! $shop->phone !!}</td>
            <td>{!! $shop->address !!}</td>
            <td>{!! $shop->note !!}</td>
            <td>
                {!! Form::open(['route' => ['shops.destroy', $shop->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('shops.show', [$shop->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('shops.edit', [$shop->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
