<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $measurement->id !!}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{!! $measurement->type !!}</p>
</div>

<!-- Weight In Grams Field -->
<div class="form-group">
    {!! Form::label('weight_in_grams', 'Weight In Grams:') !!}
    <p>{!! $measurement->weight_in_grams !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $measurement->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $measurement->updated_at !!}</p>
</div>

