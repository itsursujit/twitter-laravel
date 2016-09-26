@extends('layouts.app')

@section('content')
    @include('inventories.show_fields')

    <div class="form-group">
           <a href="{!! route('inventories.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
