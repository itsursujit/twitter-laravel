@section('styles')
    <style>
        .image-holder-current {
            width: 45%;
            height: auto;
        }

        .image-holder-new {
            width: 45%;
            height: auto;
        }
        .image-holder-current p,.image-holder-new p {
            text-align: center;
            /* font-weight: 400; */
        }
    </style>
@stop
<div class="row">
    <div class="col-sm-6">
        <div class="row">
            <div class="form-group">
                {!! Form::label('image', 'Image:') !!}
                {!! Form::file('image', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="row">
            <!-- Title Field -->
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="row">
            <!-- Title Field -->
            <div class="form-group">
                {!! Form::label('code', 'Code:') !!}
                {!! Form::text('code', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="row">
            <!-- Parent Id Field -->
            <div class="form-group">
                {!! Form::label('parent_id', 'Parent Category:') !!}
                {!! Form::select('parent_id', $categories ,  !empty($category->parent_id)?$category->parent_id:0, ['class' => 'form-control']) !!}
            </div>

        </div>

        <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{!! route('categories.index') !!}" class="btn btn-default">Cancel</a>
        </div>

    </div>
    <!-- Title Field -->

    <div class="form-group col-sm-6">
        <div class="image-holder-new img-thumbnail">
            <img src=""  class="img img-responsive">
            <p><strong>New Image</strong></p>
        </div>

        <div class="image-holder-current img-thumbnail">
            @if(!empty($category->image))
                <img src="{{ $category->image }}" class="img img-responsive" title="{!! $category->title !!}">
            @endif
            <p><strong>Current Image</strong></p>
        </div>
    </div>
</div>
@section('scripts')
    <script>
        $('#image').change(function(){
            readURL(this,'.image-holder-new img');
        });
    </script>
@stop