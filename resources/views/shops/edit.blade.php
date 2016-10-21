@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Shop</h1>
            </div>
        </div>

        @include('adminlte-templates::common.errors')

        <div class="row">
            {!! Form::model($shop, ['route' => ['shops.update', $shop->id], 'method' => 'patch']) !!}

            @include('shops.fields')

            {!! Form::close() !!}
        </div>
@endsection
