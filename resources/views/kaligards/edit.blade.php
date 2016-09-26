@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Kaligard</h1>
            </div>
        </div>

        @include('adminlte-templates::common.errors')

        <div class="row">
            {!! Form::model($kaligard, ['route' => ['kaligards.update', $kaligard->id], 'method' => 'patch']) !!}

            @include('kaligards.fields')

            {!! Form::close() !!}
        </div>
@endsection
