<!-- Kaligard Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kaligard_id', 'Kaligard Id:') !!}
    {!! Form::text('kaligard_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Product Id:') !!}
    {!! Form::date('product_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Notes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('notes', 'Notes:') !!}
    {!! Form::text('notes', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('workAssignments.index') !!}" class="btn btn-default">Cancel</a>
</div>
