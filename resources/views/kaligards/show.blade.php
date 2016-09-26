@extends('layouts.app')

@section('content')
    @include('kaligards.show_fields')

    <div class="form-group">
           <a href="{!! route('kaligards.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
