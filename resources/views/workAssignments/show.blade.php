@extends('layouts.app')

@section('content')
    @include('workAssignments.show_fields')

    <div class="form-group">
           <a href="{!! route('workAssignments.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
