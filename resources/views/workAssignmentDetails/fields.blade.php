<!-- Assignment Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('assignment_id', 'Assignment Id:') !!}
    {!! Form::text('assignment_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Material Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('material_id', 'Material Id:') !!}
    {!! Form::date('material_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Notes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('notes', 'Notes:') !!}
    {!! Form::text('notes', null, ['class' => 'form-control']) !!}
</div>

<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', 'Quantity:') !!}
    {!! Form::text('quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Returned Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('returned_quantity', 'Returned Quantity:') !!}
    {!! Form::text('returned_quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Extra Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('extra_quantity', 'Extra Quantity:') !!}
    {!! Form::text('extra_quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('workAssignmentDetails.index') !!}" class="btn btn-default">Cancel</a>
</div>
