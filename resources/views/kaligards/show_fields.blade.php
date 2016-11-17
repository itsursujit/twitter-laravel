
<!-- First Name Field -->
<div class="form-group">
    {!! Form::label('first_name', 'First Name:') !!}
    <p>{!! $kaligard->first_name !!}</p>
</div>

<!-- Middle Name Field -->
<div class="form-group">
    {!! Form::label('middle_name', 'Middle Name:') !!}
    <p>{!! $kaligard->middle_name !!}</p>
</div>

<!-- Last Name Field -->
<div class="form-group">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{!! $kaligard->last_name !!}</p>
</div>

<!-- Dob Field -->
<div class="form-group">
    {!! Form::label('dob', 'Dob:') !!}
    <p>{!! $kaligard->dob !!}</p>
</div>

<!-- Gender Field -->
<div class="form-group">
    {!! Form::label('gender', 'Gender:') !!}
    <p>{!! $kaligard->gender !!}</p>
</div>

<!-- Nationality Field -->
<div class="form-group">
    {!! Form::label('nationality', 'Nationality:') !!}
    <p>{!! $kaligard->nationality !!}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p>
        @if(!empty($kaligard->image))
            <img src="{{ URL::to($kaligard->image) }}" style="width:120px;" class="img img-responsive" alt="{!! $kaligard->first_name !!}">
        @endif
    </p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', 'Code:') !!}
    <p>{!! $kaligard->code !!}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{!! $kaligard->address !!}</p>
</div>

<!-- Id Card Type Field -->
<div class="form-group">
    {!! Form::label('id_card_type', 'Id Card Type:') !!}
    <p>{!! $kaligard->id_card_type !!}</p>
</div>


<!-- Notes Field -->
<div class="form-group">
    {!! Form::label('notes', 'Notes:') !!}
    <p>{!! $kaligard->notes !!}</p>
</div>


