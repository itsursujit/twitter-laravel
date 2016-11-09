@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New Design</h1>
        </div>
    </div>

    @include('adminlte-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'designs.store', 'files' => true]) !!}

            @include('designs.fields')

        {!! Form::close() !!}
    </div>
@endsection
