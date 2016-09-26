@extends('layouts.app')

@section('content')
    @include('measurements.show_fields')

    <div class="form-group">
           <a href="{!! route('measurements.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
