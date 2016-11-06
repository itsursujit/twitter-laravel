<table class="table table-responsive" id="kaligards-table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Code</th>
            <th>Name</th>
            <th>Nationality</th>
            <th>Address</th>
            <th>Id Card Type</th>
            <th>Notes</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($kaligards as $kaligard)
        <tr>
            <td>
                @if(!empty($kaligard->image))
                    <img src="{{ URL::to($kaligard->image) }}" style="width:120px;" class="img img-responsive" alt="{!! $kaligard->first_name !!}">
                @endif
            </td>
            <td>{!! $kaligard->code !!}</td>
            <td>{!! $kaligard->first_name . ' ' . $kaligard->middle_name . ' ' . $kaligard->last_name !!}</td>
            <td>{!! $kaligard->nationality !!}</td>
            <td>{!! $kaligard->address !!}</td>
            <td>{!! $kaligard->id_card_type !!}</td>
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
