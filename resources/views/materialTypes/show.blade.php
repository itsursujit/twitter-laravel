@extends('layouts.app')

@section('content')
    @include('materialTypes.show_fields')

    <div class="form-group">
           <a href="{!! route('materialTypes.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
