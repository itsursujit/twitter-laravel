@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New Measurement</h1>
        </div>
    </div>

    @include('adminlte-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'measurements.store']) !!}

            @include('measurements.fields')

        {!! Form::close() !!}
    </div>
@endsection
