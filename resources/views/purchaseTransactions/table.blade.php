<table class="table table-responsive" id="purchaseTransactions-table">
    <thead>
        <th>Material Id</th>
        <th>Purchased Date</th>
        <th>Purchased From</th>
        <th>Quantity</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($purchaseTransactions as $purchaseTransaction)
        <tr>
            <td>{!! $purchaseTransaction->material_id !!}</td>
            <td>{!! $purchaseTransaction->purchased_date !!}</td>
            <td>{!! $purchaseTransaction->purchased_from !!}</td>
            <td>{!! $purchaseTransaction->quantity !!}</td>
            <td>
                {!! Form::open(['route' => ['purchaseTransactions.destroy', $purchaseTransaction->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('purchaseTransactions.show', [$purchaseTransaction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('purchaseTransactions.edit', [$purchaseTransaction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
