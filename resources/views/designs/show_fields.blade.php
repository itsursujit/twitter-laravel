<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', 'Code:') !!}
    <p>{!! $design->code !!}</p>
</div>

<!-- Category Field -->
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    <p>{!! $design->category !!}</p>
</div>

<!-- Sub Category Field -->
<div class="form-group">
    {!! Form::label('sub_category', 'Sub Category:') !!}
    <p>{!! $design->sub_category !!}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p>@if(!empty($design->image))
            <img src="{{ URL::to($design->image) }}" style="width: 120px;" class="img img-responsive" alt="{!! $design->code !!}">
        @endif</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $design->description !!}</p>
</div>

