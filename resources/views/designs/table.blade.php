<table class="table table-responsive" id="designs-table">
    <thead>
        <th>Code</th>
        <th>Category</th>
        <th>Sub Category</th>
        <th>Image</th>
        <th>Description</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($designs as $design)
        <tr>
            <td>{!! $design->code !!}</td>
            <td>{!! $design->category !!}</td>
            <td>{!! $design->sub_category !!}</td>
            <td>{!! $design->image !!}</td>
            <td>{!! $design->description !!}</td>
            <td>
                {!! Form::open(['route' => ['designs.destroy', $design->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('designs.show', [$design->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('designs.edit', [$design->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
