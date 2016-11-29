<table class="table table-responsive" id="products-table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Code</th>
            <th>Product Name</th>
            <th>Weight</th>
            <th>Jarti</th>
            <th>Wages</th>
            <th>Amount</th>
            <th class="no-sort">Status</th>
            <th class="no-sort">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>
                @if(!empty($product->design->image))
                    <img src="{{ $product->design->image }}" style="width:120px;" class="img img-responsive" alt="{!! $product->title !!}">
                @endif
            </td>
            <td>{!! !empty($product->design)?$product->design->code:'' !!}</td>
            <td>{!! $product->title !!}</td>
            <td>{!! $product->weight !!}</td>
            <td>{!! $product->additional_jarti !!}</td>
            <td>{!! $product->wages !!}</td>
            <td>{!! $product->amount !!}</td>
            <td>
                @if($product->status == 'Not Started')
                    <span for="" class="label label-danger">{!! $product->status !!}</span>
                @elseif($product->status == 'In Progress')
                    <span for="" class="label label-warning">{!! $product->status !!}</span>
                @elseif($product->status == 'Completed')
                    <span for="" class="label label-success">{!! $product->status !!}</span>
                @endif
            </td>
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
