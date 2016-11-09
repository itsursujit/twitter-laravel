@extends('layouts.app')

@section('content')
    @include('designs.show_fields')

    <div class="form-group">
           <a href="{!! route('designs.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
