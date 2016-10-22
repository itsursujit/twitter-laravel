@extends('layouts.app')

@section('content')
    @include('shops.show_fields')

    <div class="form-group">
           <a href="{!! route('shops.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
