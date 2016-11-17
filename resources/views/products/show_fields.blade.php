<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', 'Code:') !!}
    <p>{!! $product->code !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{!! $product->title !!}</p>
</div>

<!-- Weight Field -->
<div class="form-group">
    {!! Form::label('weight', 'Weight:') !!}
    <p>{!! $product->weight !!}</p>
</div>

<!-- Additional Jarti Field -->
<div class="form-group">
    {!! Form::label('additional_jarti', 'Additional Jarti:') !!}
    <p>{!! $product->additional_jarti !!}</p>
</div>

<!-- Wages Field -->
<div class="form-group">
    {!! Form::label('wages', 'Wages:') !!}
    <p>{!! $product->wages !!}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p>
        @if(!empty($product->design->image))
            <img src="{{ $product->design->image }}" style="width:120px;" class="img img-responsive" alt="{!! $product->title !!}">
        @endif
    </p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $product->status !!}</p>
</div>

<!-- Is Ready Field -->
<div class="form-group">
    {!! Form::label('is_ready', 'Is Ready:') !!}
    <p>{!! $product->is_ready !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{!! $product->amount !!}</p>
</div>

<!-- Notes Field -->
<div class="form-group">
    {!! Form::label('notes', 'Notes:') !!}
    <p>{!! $product->notes !!}</p>
</div>

<!-- Material Description Field -->
<div class="form-group">
    {!! Form::label('material_description', 'Material Description:') !!}
    <p>{!! $product->material_description !!}</p>
</div>

