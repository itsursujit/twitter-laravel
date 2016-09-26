@extends('layouts.app')

@section('content')
    @include('purchaseTransactions.show_fields')

    <div class="form-group">
           <a href="{!! route('purchaseTransactions.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
