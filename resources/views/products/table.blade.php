<table class="table table-responsive" id="products-table">
    <thead>
        <th>Id</th>
        <th>Code</th>
        <th>Title</th>
        <th>Category</th>
        <th>Sub Category</th>
        <th>Weight</th>
        <th>Additional Jarti</th>
        <th>Wages</th>
        <th>Image</th>
        <th>Status</th>
        <th>Is Ready</th>
        <th>Amount</th>
        <th>Notes</th>
        <th>Material Description</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{!! $product->id !!}</td>
            <td>{!! $product->code !!}</td>
            <td>{!! $product->title !!}</td>
            <td>{!! $product->category !!}</td>
            <td>{!! $product->sub_category !!}</td>
            <td>{!! $product->weight !!}</td>
            <td>{!! $product->additional_jarti !!}</td>
            <td>{!! $product->wages !!}</td>
            <td>{!! $product->image !!}</td>
            <td>{!! $product->status !!}</td>
            <td>{!! $product->is_ready !!}</td>
            <td>{!! $product->amount !!}</td>
            <td>{!! $product->notes !!}</td>
            <td>{!! $product->material_description !!}</td>
            <td>
                {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('products.show', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('products.edit', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
