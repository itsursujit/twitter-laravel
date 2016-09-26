<table class="table table-responsive" id="workAssignmentDetails-table">
    <thead>
        <th>Assignment Id</th>
        <th>Material Id</th>
        <th>Notes</th>
        <th>Quantity</th>
        <th>Returned Quantity</th>
        <th>Extra Quantity</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($workAssignmentDetails as $workAssignmentDetail)
        <tr>
            <td>{!! $workAssignmentDetail->assignment_id !!}</td>
            <td>{!! $workAssignmentDetail->material_id !!}</td>
            <td>{!! $workAssignmentDetail->notes !!}</td>
            <td>{!! $workAssignmentDetail->quantity !!}</td>
            <td>{!! $workAssignmentDetail->returned_quantity !!}</td>
            <td>{!! $workAssignmentDetail->extra_quantity !!}</td>
            <td>
                {!! Form::open(['route' => ['workAssignmentDetails.destroy', $workAssignmentDetail->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('workAssignmentDetails.show', [$workAssignmentDetail->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('workAssignmentDetails.edit', [$workAssignmentDetail->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
