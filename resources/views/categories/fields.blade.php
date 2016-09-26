<div class="row">
    <!-- Title Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <!-- Parent Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('parent_id', 'Parent Category:') !!}
        {!! Form::select('parent_id', $categories ,  $category->parent_id?$category->parent_id:0, ['class' => 'form-control']) !!}
    </div>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('categories.index') !!}" class="btn btn-default">Cancel</a>
</div>
