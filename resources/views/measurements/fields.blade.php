<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Weight In Grams Field -->
<div class="form-group col-sm-6">
    {!! Form::label('weight_in_grams', 'Weight In Grams:') !!}
    {!! Form::text('weight_in_grams', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('measurements.index') !!}" class="btn btn-default">Cancel</a>
</div>
