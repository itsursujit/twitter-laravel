@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit PurchaseTransaction</h1>
            </div>
        </div>

        @include('adminlte-templates::common.errors')

        <div class="row">
            {!! Form::model($purchaseTransaction, ['route' => ['purchaseTransactions.update', $purchaseTransaction->id], 'method' => 'patch']) !!}

            @include('purchaseTransactions.fields')

            {!! Form::close() !!}
        </div>
@endsection
