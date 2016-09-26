<table class="table table-responsive" id="kaligards-table">
    <thead>
        <th>Id</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Gender</th>
        <th>Nationality</th>
        <th>Image</th>
        <th>Code</th>
        <th>Address</th>
        <th>Id Card Type</th>
        <th>Id Card Image</th>
        <th>Notes</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($kaligards as $kaligard)
        <tr>
            <td>{!! $kaligard->id !!}</td>
            <td>{!! $kaligard->first_name !!}</td>
            <td>{!! $kaligard->middle_name !!}</td>
            <td>{!! $kaligard->gender !!}</td>
            <td>{!! $kaligard->nationality !!}</td>
            <td>{!! $kaligard->image !!}</td>
            <td>{!! $kaligard->code !!}</td>
            <td>{!! $kaligard->address !!}</td>
            <td>{!! $kaligard->id_card_type !!}</td>
            <td>{!! $kaligard->id_card_image !!}</td>
            <td>{!! $kaligard->notes !!}</td>
            <td>
                {!! Form::open(['route' => ['kaligards.destroy', $kaligard->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('kaligards.show', [$kaligard->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('kaligards.edit', [$kaligard->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
