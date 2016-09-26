<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $purchaseTransaction->id !!}</p>
</div>

<!-- Material Id Field -->
<div class="form-group">
    {!! Form::label('material_id', 'Material Id:') !!}
    <p>{!! $purchaseTransaction->material_id !!}</p>
</div>

<!-- Purchased Date Field -->
<div class="form-group">
    {!! Form::label('purchased_date', 'Purchased Date:') !!}
    <p>{!! $purchaseTransaction->purchased_date !!}</p>
</div>

<!-- Purchased From Field -->
<div class="form-group">
    {!! Form::label('purchased_from', 'Purchased From:') !!}
    <p>{!! $purchaseTransaction->purchased_from !!}</p>
</div>

<!-- Quantity Field -->
<div class="form-group">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{!! $purchaseTransaction->quantity !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $purchaseTransaction->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $purchaseTransaction->updated_at !!}</p>
</div>

