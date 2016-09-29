<table class="table table-responsive" id="materialTypes-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Quantity (in GRAMS)</th>
            <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($materialTypes as $materialType)
        <tr>
            <td>{!! $materialType->id !!}</td>
            <td>{!! $materialType->title !!}</td>
            <td>{!! $materialType->quantity !!}</td>
            <td>{!! $materialType->description !!}</td>
            <td>
                {!! Form::open(['route' => ['materialTypes.destroy', $materialType->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('materialTypes.show', [$materialType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('materialTypes.edit', [$materialType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
