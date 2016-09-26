@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Measurement</h1>
            </div>
        </div>

        @include('adminlte-templates::common.errors')

        <div class="row">
            {!! Form::model($measurement, ['route' => ['measurements.update', $measurement->id], 'method' => 'patch']) !!}

            @include('measurements.fields')

            {!! Form::close() !!}
        </div>
@endsection
