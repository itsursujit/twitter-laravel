@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit WorkAssignmentDetail</h1>
            </div>
        </div>

        @include('adminlte-templates::common.errors')

        <div class="row">
            {!! Form::model($workAssignmentDetail, ['route' => ['workAssignmentDetails.update', $workAssignmentDetail->id], 'method' => 'patch']) !!}

            @include('workAssignmentDetails.fields')

            {!! Form::close() !!}
        </div>
@endsection
