
<!-- Purchased Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('purchased_date', 'Purchased Date:') !!}
    {!! Form::date('purchased_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Purchased From Field -->
<div class="form-group col-sm-6">
    {!! Form::label('purchased_from', 'Purchased From:') !!}
    {!! Form::text('purchased_from', null, ['class' => 'form-control']) !!}
</div>


<!-- Material Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('material_id', 'Material Type:') !!}
    {!! Form::select('material_id', $materials, null, ['class' => 'form-control']) !!}
</div>

<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', 'Quantity (in Grams):') !!}
    {!! Form::text('quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('purchaseTransactions.index') !!}" class="btn btn-default">Cancel</a>
</div>
