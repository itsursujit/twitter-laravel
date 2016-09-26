<table class="table table-responsive" id="categories-table">
    <thead>
        <th>Id</th>
        <th>Title</th>
        <th>Parent Category</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($categories as $category)
        @if($category->id)
        <tr>
            <td>{!! $category->id !!}</td>
            <td>{!! $category->title !!}</td>
            <td>{!! $category->parentCategory->title !!}</td>
            <td>
                {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('categories.show', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('categories.edit', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endif
    @endforeach
    </tbody>
</table>