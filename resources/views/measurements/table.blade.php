<table class="table table-responsive" id="measurements-table">
    <thead>
        <th>Id</th>
        <th>Type</th>
        <th>Weight In Grams</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($measurements as $measurement)
        <tr>
            <td>{!! $measurement->id !!}</td>
            <td>{!! $measurement->type !!}</td>
            <td>{!! $measurement->weight_in_grams !!}</td>
            <td>
                {!! Form::open(['route' => ['measurements.destroy', $measurement->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('measurements.show', [$measurement->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('measurements.edit', [$measurement->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
