@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New Kaligard</h1>
        </div>
    </div>

    @include('adminlte-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'kaligards.store']) !!}

            @include('kaligards.fields')

        {!! Form::close() !!}
    </div>
@endsection
