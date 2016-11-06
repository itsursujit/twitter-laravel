@extends('layouts.app')

@section('content')
    <style>
        .category-wrapper.list-group-item{
            min-height:100px;
        }
        .white {
            color: #fff;
        }
    </style>
<div class="container">
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Product Categories
                    </div>

                    <div class="panel-body">
                        <div class="list-group">
                        @foreach($categories as $key => $category)
                        <div class="category-wrapper list-group-item">
                            <div class="col-md-3">
                                <img class="img img-responsive img-circle" src="{{ URL::to($category['image']) }}" alt="">
                            </div>
                            <div class="col-md-9">
                                <div class="category-title">
                                    <h4>{{ $category['title'] }}</h4>
                                </div>
                                <div class="category-description">
                                    <span class="label label-danger"><a href="{{ URL::to('/products/?status=not-started&cat='.$category['id']) }}" class="white">{{ $category['products']['not_started'] }} Not Started</a></span>
                                    <span class="label label-warning"><a href="{{ URL::to('/products/?status=in-progress&cat='.$category['id']) }}" class="white">{{ $category['products']['in_progress'] }} In Progress</a></span>
                                    <span class="label label-success"><a href="{{ URL::to('/products/?status=completed&cat='.$category['id']) }}" class="white">{{ $category['products']['completed'] }} Completed</a></span>
                                    <span class="label label-default"><a href="{{ URL::to('/products/?cat='.$category['id']) }}" class="white">View All</a></span>
                                </div>
                            </div>
                        </div>
                        @endforeach


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Kaligard Summary
                    </div>

                    <div class="panel-body">
                        <div class="list-group">
                            @foreach($kaligards as $key => $kaligard)
                                <div class="category-wrapper list-group-item">
                                    <div class="col-md-3">
                                        <img class="img img-responsive img-circle" src="{{ URL::to($kaligard['image']) }}" alt="">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="category-title">
                                            <h4>{{ $kaligard['first_name'] . " " . $kaligard['middle_name'] . " " . $kaligard['last_name'] }}</h4>
                                        </div>
                                        <div class="category-description">
                                            <span class="label label-danger"><a href="{{ URL::to('/kaligards/?status=not-started&cat='.$kaligard['id']) }}" class="white">{{ $kaligard['products']['not_started'] }} Not Started</a></span>
                                            <span class="label label-warning"><a href="{{ URL::to('/kaligards/?status=in-progress&cat='.$kaligard['id']) }}" class="white">{{ $kaligard['products']['in_progress'] }} In Progress</a></span>
                                            <span class="label label-success"><a href="{{ URL::to('/kaligards/?status=completed&cat='.$kaligard['id']) }}" class="white">{{ $kaligard['products']['completed'] }} Completed</a></span>
                                            <span class="label label-default"><a href="{{ URL::to('/kaligards/?cat='.$kaligard['id']) }}" class="white">View All</a></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
