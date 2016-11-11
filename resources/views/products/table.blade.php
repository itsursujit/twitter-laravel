<table class="table table-responsive" id="products-table">
    <thead>
        <th>Image</th>
        <th>Code</th>
        <th>Title</th>
        <th>Weight</th>
        <th>Jarti</th>
        <th>Wages</th>
        <th>Amount</th>
        <th>Status</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>
                @if(!empty($product->design->image))
                    <img src="{{ $product->design->image }}" style="width:120px;" class="img img-responsive" alt="{!! $product->title !!}">
                @endif
            </td>
            <td>{!! $product->code !!}</td>
            <td>{!! $product->design->code !!}</td>
            <td>{!! $product->weight !!}</td>
            <td>{!! $product->additional_jarti !!}</td>
            <td>{!! $product->wages !!}</td>
            <td>{!! $product->amount !!}</td>
            <td>
                @if($product->status == 'Not Started')
                    <label for="" class="label label-danger">{!! $product->status !!}</label>
                @elseif($product->status == 'In Progress')
                    <label for="" class="label label-warning">{!! $product->status !!}</label>
                @elseif($product->status == 'Completed')
                    <label for="" class="label label-success">{!! $product->status !!}</label>
                @endif
            </td>
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
