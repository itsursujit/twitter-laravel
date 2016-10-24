@section('styles')
    <style>
        .image-holder {
            min-width: 200px;
            min-height: 180px;
        }
        /*#image{display: none;}*/
    </style>
@stop
<div class="row">
    <div class="col-sm-3">
        <div class="image-holder img-thumbnail">
            @if(!empty($product))
                <img src="{{ !empty($product->subCategories->image)?$product->subCategories->image:$product->image }}" style="width:120px;" class="img img-responsive" alt="{!! $product->title !!}">
            @endif
        </div>
        {{--
        <div class="form-group">
            {!! Form::label('image', ' ') !!}
            {!! Form::file('image', null, ['class' => 'form-control']) !!}
            --}}{{--<input type="button" value="Upload Product Image" class="btn btn-danger" onclick="document.getElementById('image').click();" />--}}{{--
        </div>--}}
    </div>
    <div class="col-sm-9"><!-- Code Field -->

        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Product Information
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
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

                        <div class="form-group col-sm-6">
                            {!! Form::label('code', 'Design Code:') !!}
                            {!! Form::text('code', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-6">
                            {!! Form::label('registration_code', 'Registration Code:') !!}
                            {!! Form::text('registration_code', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-6">
                            {!! Form::label('product_type', 'Product Type:') !!}
                            {!! Form::radio('product_type', 'sale', true) !!} Sale
                            {!! Form::radio('product_type', 'order') !!} Order
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Additional Information
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <!-- Weight Field -->
                        <div class="form-group col-sm-3">
                            {!! Form::label('shop', 'For Shop:') !!}
                            {!! Form::select('shop', $shops, null, ['class' => 'form-control']) !!}
                        </div>
                        <!-- Weight Field -->
                        <div class="form-group col-sm-3">
                            {!! Form::label('weight', 'Weight:') !!}
                            {!! Form::text('weight', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Additional Jarti Field -->
                        <div class="form-group col-sm-3">
                            {!! Form::label('additional_jarti', 'Jarti:') !!}
                            {!! Form::text('additional_jarti', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Wages Field -->
                        <div class="form-group col-sm-3">
                            {!! Form::label('wages', 'Wages:') !!}
                            {!! Form::text('wages', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Amount Field -->
                        <div class="form-group col-sm-3">
                            {!! Form::label('size', 'Size:') !!}
                            {!! Form::text('size', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Amount Field -->
                        <div class="form-group col-sm-3">
                            {!! Form::label('length', 'Length:') !!}
                            {!! Form::text('length', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Status Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('status', 'Status:') !!}
                            {!! Form::select('status', ["Not Started" => "Not Started", "In Progress" => "In Progress", "Completed" => "Completed"], null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Assign Kaligard
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                            <!-- Amount Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('assigned_date', 'Assigned Date:') !!}
                                {!! Form::date('assigned_date', date('Y-m-d'), ['class' => 'form-control']) !!}
                            </div>

                            <!-- Amount Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('deadline', 'Deadline:') !!}
                                {!! Form::date('deadline', date('Y-m-d'), ['class' => 'form-control']) !!}
                            </div>

                            <!-- Sub Category Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('kaligards', 'Kaligard Name:') !!}
                                {!! Form::select('kaligards', $kaligards, !empty($assignments)?$assignments['kaligard_id']:null , ['class' => 'form-control']) !!}
                            </div>

                            <!-- Sub Category Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('kaligard_note', 'Note for:') !!}
                                {!! Form::textarea('kaligard_note', null, ['class' => 'form-control', 'rows' => '3']) !!}
                            </div>

                            <div class="form-group col-sm-12">
                                <button class="add-material btn btn-info" type="button">Add another Material</button>
                                <table class="table table-bordered material-list">
                                    <thead>
                                    <tr>
                                        <th>{!! Form::label('materials', 'Material') !!}</th>
                                        <th>{!! Form::label('qty', 'Qty') !!}</th>
                                        <th style="display: none;">{!! Form::label('extra_qty', 'Extra Qty') !!}</th>
                                        <th style="display: none;">{!! Form::label('returned_qty', 'Returned Qty') !!}</th>
                                        <th colspan="2">{!! Form::label('note', 'Note') !!}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="material-row">
                                            <td>
                                                {!! Form::select('materials[]', $materials, null, ['class' => 'form-control materials']) !!}
                                            </td>
                                            <td>
                                                @if(empty($product))
                                                    {!! Form::text('qty[]', 0, ['class' => 'form-control qty']) !!}
                                                @else
                                                    {!! Form::text('qty[]', 0, ['class' => 'form-control qty','readonly' => 'readonly']) !!}
                                                @endif

                                            </td>
                                            <td style="display: none;">
                                                @if(empty($product))
                                                    {!! Form::text('extra_qty[]', 0, ['class' => 'form-control extra_qty','readonly' => 'readonly']) !!}
                                                @else
                                                    {!! Form::text('extra_qty[]', 0, ['class' => 'form-control extra_qty']) !!}
                                                @endif
                                            </td>
                                            <td style="display: none;">
                                                @if(empty($product))
                                                    {!! Form::text('returned_qty[]', 0, ['class' => 'form-control returned_qty','readonly' => 'readonly']) !!}
                                                @else
                                                    {!! Form::text('returned_qty[]', 0, ['class' => 'form-control returned_qty']) !!}
                                                @endif
                                            </td>
                                            <td>
                                                {!! Form::textarea('note[]', null, ['class' => 'form-control note', 'rows' => '1']) !!}
                                            </td>
                                            <td>
                                                <a class="btn-trash" style="display: none;"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingFour">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Product Notes
                        </a>
                    </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                    <div class="panel-body">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <!-- Notes Field -->
                            <div class="form-group col-sm-12 col-lg-6">
                                {!! Form::label('notes', 'Notes:') !!}
                                {!! Form::textarea('notes', null, ['class' => 'form-control', 'rows' => '5']) !!}
                            </div>


                            <!-- Material Description Field -->
                            <div class="form-group col-sm-12 col-lg-6">
                                {!! Form::label('material_description', 'Material Description:') !!}
                                {!! Form::textarea('material_description', null, ['class' => 'form-control', 'rows' => '5']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{!! route('products.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
@section('scripts')
    <script>
        $('#image').change(function(){
            readURL(this,'.image-holder img');
        });

        $('.add-material').click(function(){
            var materials = $('.material-list tbody tr:last');
            var selectedMaterial = $('.material-list tbody tr:last .materials option:selected');
            var materialoptions = $(materials).find('.materials option').not(selectedMaterial).clone();
            if(materialoptions.length>0){
                $('.material-list tbody').append("<tr>" + materials.html() + "</tr>");
                $('.material-list tbody tr:last .materials').html(materialoptions);
                $('.material-list tbody tr:last .btn-trash').show();
            }


        })
        $(document).on('click', '.btn-trash', function() {
           $(this).parent().parent().remove();
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