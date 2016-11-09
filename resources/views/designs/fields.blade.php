<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Field -->
<div class="form-group col-sm-6">
    <label for="category">Category:</label>
    <select name="category" id="category" class="form-control">
        <option value="">Select Category</option>
        @foreach($main_category as $key => $category)
            @if(!empty($product->category) && $product->category == $category['id'])
                <option value="{{ $category['id'] }}" selected data-value="{{ $category['code'] }}">{{ $category['title'] }}</option>
            @else
                <option value="{{ $category['id'] }}" data-value="{{ $category['code'] }}">{{ $category['title'] }}</option>
            @endif
        @endforeach
    </select>
</div>

<!-- Sub Category Field -->
<div class="form-group col-sm-6">
    <label for="sub_category">Sub Category:</label>
    <select name="sub_category" id="sub_category" class="form-control">
        <option value="">Select Sub Category</option>
        @foreach($sub_category as $key => $category)
            @if(!empty($product->sub_category) && $product->sub_category == $category['id'])
                <option value="{{ $category['id'] }}" class="category-options parent-{{ $category['parent_id'] }}" selected data-value="{{ $category['code'] }}">{{ $category['title'] }}</option>
            @else
                <option value="{{ $category['id'] }}" class="category-options parent-{{ $category['parent_id'] }}" data-value="{{ $category['code'] }}">{{ $category['title'] }}</option>
            @endif
        @endforeach
    </select>
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    <div class="col-sm-6">
        {!! Form::label('image', 'Image:') !!}
        {!! Form::file('image') !!}
    </div>
    <div class="col-sm-6">
        <div class="image-holder-current img-thumbnail">
            <img class="img img-responsive">
        </div>
    </div>
</div>
<div class="clearfix"></div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('designs.index') !!}" class="btn btn-default">Cancel</a>
</div>
@section('scripts')
    <script>
        $('#image').change(function(){
            readURL(this,'.image-holder-current img');
        });

        $('#category').change(function(){
            var category = $(this).val();
            getCodes();
            $('.category-options').hide();
            $('.parent-'+category).show();
        });

        $('#sub_category').change(function(){
            getCodes();
        });

        function getCodes() {
            var cat_code = $('#category').find(':selected').data('value');
            var subcat_code = $('#sub_category').find(':selected').data('value');
            if(typeof cat_code == "undefined"){
                cat_code = "";
            }
            if(typeof subcat_code == "undefined"){
                subcat_code = "";
            }
            var code = cat_code + "" + subcat_code;
            $('#code').val(code);
        }

        $('#category').trigger('change');
        $('#sub_category').trigger('change');
    </script>
@stop
