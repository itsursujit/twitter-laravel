@extends('layouts.app')

@section('content')
        <div class="pull-left col-md-8">
            <h1>Products</h1>
            <form action="{{ URL::to('/products') }}">
                <div class="row">
                    <div class="col-md-5">
                        <select name="status" id="status" class="form-control">
                            <option value="not-started" @if(!empty($status) && $status =="not-started") {{ "selected" }} @endif>Not Started</option>
                            <option value="in-progress" @if(!empty($status) && $status =="in-progress") {{ "selected" }} @endif>In Progress</option>
                            <option value="completed" @if(!empty($status) && $status =="completed") {{ "selected" }} @endif>Completed</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary col-md-4">Search</button>
                    </div>

                </div>
            </form>
        </div>
        <div class="pull-right col-md-4">
                <a class="btn btn-primary" style="margin-top: 25px" href="{!! route('products.create') !!}">Add New</a>
        </div>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('products.table')
        
@endsection
