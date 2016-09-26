@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit MaterialType</h1>
            </div>
        </div>

        @include('adminlte-templates::common.errors')

        <div class="row">
            {!! Form::model($materialType, ['route' => ['materialTypes.update', $materialType->id], 'method' => 'patch']) !!}

            @include('materialTypes.fields')

            {!! Form::close() !!}
        </div>
@endsection
