<table class="table table-responsive" id="workAssignments-table">
    <thead>
        <th>Kaligard Name</th>
        <th>Product Name</th>
        <th>Notes</th>
        {{--<th colspan="3">Action</th>--}}
    </thead>
    <tbody>
    @foreach($workAssignments as $workAssignment)
        <tr>
            <td>{!! $workAssignment->kaligard_code . ' - ' . $workAssignment->first_name . ' ' . $workAssignment->middle_name . ' ' . $workAssignment->last_name !!}</td>
            <td>{!! $workAssignment->product_code . ' ' . $workAssignment->title . ' ' . $workAssignment->category . ' ' . $workAssignment->sub_category !!}</td>
            <td>{!! $workAssignment->notes !!}</td>
            {{--<td>
                {!! Form::open(['route' => ['workAssignments.destroy', $workAssignment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('workAssignments.show', [$workAssignment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('workAssignments.edit', [$workAssignment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>--}}
        </tr>
    @endforeach
    </tbody>
</table>
