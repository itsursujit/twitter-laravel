@section('styles')
    <style>
        .image-holder {
            min-width: 200px;
            min-height: 180px;
        }
        #image{display: none;}
    </style>
@stop
<div class="row">
    <div class="col-sm-3">
        <div class="image-holder img-thumbnail">
            <img src="{{ !empty($product->image)?$product->image:'' }}" alt="" class="img img-responsive">
        </div>
        <div class="form-group">
            {!! Form::label('image', ' ') !!}
            {!! Form::file('image', null, ['class' => 'form-control']) !!}
            <input type="button" value="Upload Product Image" class="btn btn-danger" onclick="document.getElementById('image').click();" />
        </div>
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
                        <div class="form-group col-sm-3">
                            {!! Form::label('code', 'Code:') !!}
                            {!! Form::text('code', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Title Field -->
                        <div class="form-group col-sm-9">
                            {!! Form::label('title', 'Title:') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Category Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('category', 'Category:') !!}
                            {!! Form::select('category', $main_category, null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Sub Category Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('sub_category', 'Sub Category:') !!}
                            {!! Form::select('sub_category', $sub_category, null, ['class' => 'form-control']) !!}
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
                            {!! Form::label('weight', 'Weight:') !!}
                            {!! Form::text('weight', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Additional Jarti Field -->
                        <div class="form-group col-sm-3">
                            {!! Form::label('additional_jarti', 'Additional Jarti:') !!}
                            {!! Form::text('additional_jarti', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Wages Field -->
                        <div class="form-group col-sm-3">
                            {!! Form::label('wages', 'Wages:') !!}
                            {!! Form::text('wages', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Amount Field -->
                        <div class="form-group col-sm-3">
                            {!! Form::label('amount', 'Amount:') !!}
                            {!! Form::text('amount', null, ['class' => 'form-control']) !!}
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
                                            <th width="25%">{!! Form::label('materials', 'Material') !!}</th>
                                            <th width="15%">{!! Form::label('qty', 'Qty') !!}</th>
                                            <th width="15%">{!! Form::label('extra_qty', 'Extra Qty') !!}</th>
                                            <th width="18%">{!! Form::label('returned_qty', 'Returned Qty') !!}</th>
                                            <th>{!! Form::label('note', 'Note') !!}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(empty($assignment_details))
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
                                            <td>
                                                @if(empty($product))
                                                    {!! Form::text('extra_qty[]', 0, ['class' => 'form-control extra_qty','readonly' => 'readonly']) !!}
                                                @else
                                                    {!! Form::text('extra_qty[]', 0, ['class' => 'form-control extra_qty']) !!}
                                                @endif
                                            </td>
                                            <td>
                                                @if(empty($product))
                                                    {!! Form::text('returned_qty[]', 0, ['class' => 'form-control returned_qty','readonly' => 'readonly']) !!}
                                                @else
                                                    {!! Form::text('returned_qty[]', 0, ['class' => 'form-control returned_qty']) !!}
                                                @endif
                                            </td>
                                            <td>
                                                {!! Form::textarea('note[]', null, ['class' => 'form-control note', 'rows' => '1']) !!}
                                            </td>
                                        </tr>
                                        @else
                                            @foreach($assignment_details as $key => $details)
                                            <tr class="material-row">
                                                <td>
                                                    {!! Form::select('materials[]', $materials, $details['material_id'], ['class' => 'form-control materials']) !!}
                                                </td>
                                                <td>
                                                    @if(empty($product))
                                                        {!! Form::text('qty[]', $details['quantity'], ['class' => 'form-control qty']) !!}
                                                    @else
                                                        {!! Form::text('qty[]', $details['quantity'], ['class' => 'form-control qty','readonly' => 'readonly']) !!}
                                                    @endif

                                                </td>
                                                <td>
                                                    @if(empty($product))
                                                        {!! Form::text('extra_qty[]', $details['extra_quantity'], ['class' => 'form-control extra_qty','readonly' => 'readonly']) !!}
                                                    @else
                                                        {!! Form::text('extra_qty[]', $details['extra_quantity'], ['class' => 'form-control extra_qty']) !!}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(empty($product))
                                                        {!! Form::text('returned_qty[]', $details['returned_quantity'], ['class' => 'form-control returned_qty','readonly' => 'readonly']) !!}
                                                    @else
                                                        {!! Form::text('returned_qty[]', $details['returned_quantity'], ['class' => 'form-control returned_qty']) !!}
                                                    @endif
                                                </td>
                                                <td>
                                                    {!! Form::textarea('note[]', $details['notes'], ['class' => 'form-control note', 'rows' => '1']) !!}
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
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
            $('.material-list tbody').append("<tr>" + materials.html() + "</tr>");
            $('.material-list tbody tr:last .materials').html(materialoptions);

        })
    </script>
@stop