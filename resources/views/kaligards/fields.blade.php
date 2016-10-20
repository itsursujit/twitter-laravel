@section('styles')
    <style>
        .image-holder {
            min-width: 200px;
            min-height: 180px;
        }
    </style>
@stop
<div class="row">
    <div class="col-sm-3">
        <div class="image-holder">
            <img src="{{ !empty($kaligard->image)?$kaligard->image:'' }}" alt="" class="img img-responsive">
        </div>
        <div class="form-group">
            {!! Form::label('image', 'Image:') !!}
            {!! Form::file('image', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-sm-9">
        <div class="row">
            <div class="col-sm-4">
                <!-- First Name Field -->
                <div class="form-group">
                    {!! Form::label('first_name', 'First Name:') !!}
                    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                </div>

            </div>
            <div class="col-sm-4">

                <!-- Middle Name Field -->
                <div class="form-group">
                    {!! Form::label('middle_name', 'Middle Name:') !!}
                    {!! Form::text('middle_name', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-sm-4">

                <!-- Middle Name Field -->
                <div class="form-group">
                    {!! Form::label('last_name', 'Last Name:') !!}
                    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <!-- First Name Field -->
                <div class="form-group">
                    {!! Form::label('father_name', 'Father Name:') !!}
                    {!! Form::text('father_name', null, ['class' => 'form-control']) !!}
                </div>

            </div>
            <div class="col-sm-4">

                <!-- Middle Name Field -->
                <div class="form-group">
                    {!! Form::label('phone_1', 'Phone No #1:') !!}
                    {!! Form::text('phone_1', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-sm-4">

                <!-- Middle Name Field -->
                <div class="form-group">
                    {!! Form::label('phone_2', 'Phone No #2:') !!}
                    {!! Form::text('phone_2', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Gender Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('gender', 'Gender:') !!}
                {!! Form::select('gender', ['male'=>'Male', 'female'=>'Female'], null, ['class' => 'form-control']) !!}
            </div>

            <!-- Code Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('code', 'Kaligard Code:') !!}
                {!! Form::text('code', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <!-- Address Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('address', 'Address:') !!}
                {!! Form::text('address', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="row">
            <!-- Nationality Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('nationality', 'Nationality:') !!}
                {!! Form::text('nationality', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Id Card Type Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('id_card_type', 'Id Card Type:') !!}
                {!! Form::select('id_card_type', ['Passport' =>'Passport', 'Citizenship' => 'Citizenship', 'Driving License' =>'Driving License'], null, ['class' => 'form-control']) !!}
            </div>

            <!-- Id Card Type Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('id_number', 'Id Number:') !!}
                {!! Form::text('id_number', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- Notes Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('notes', 'Notes:') !!}
        {!! Form::textarea('notes', null, ['class' => 'form-control', 'rows' => '5']) !!}
    </div>


    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('kaligards.index') !!}" class="btn btn-default">Cancel</a>
    </div>

</div>
@section('scripts')
    <script>
        $('#image').change(function(){
            readURL(this,'.image-holder img');
        });
    </script>
@stop