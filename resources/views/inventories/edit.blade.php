@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Inventory</h1>
            </div>
        </div>

        @include('adminlte-templates::common.errors')

        <div class="row">
            {!! Form::model($inventory, ['route' => ['inventories.update', $inventory->id], 'method' => 'patch']) !!}

            @include('inventories.fields')

            {!! Form::close() !!}
        </div>
@endsection
