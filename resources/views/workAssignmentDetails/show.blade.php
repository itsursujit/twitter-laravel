@extends('layouts.app')

@section('content')
    @include('workAssignmentDetails.show_fields')

    <div class="form-group">
           <a href="{!! route('workAssignmentDetails.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
