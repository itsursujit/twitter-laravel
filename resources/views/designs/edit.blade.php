@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Design</h1>
            </div>
        </div>

        @include('adminlte-templates::common.errors')

        <div class="row">
            {!! Form::model($design, ['route' => ['designs.update', $design->id], 'method' => 'patch', 'files' => true]) !!}

            @include('designs.fields')

            {!! Form::close() !!}
        </div>
@endsection
