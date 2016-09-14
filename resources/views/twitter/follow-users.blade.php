<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recommended Twitter Users</title>
    <link rel="stylesheet" href="{{ URL::to('/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::to('/css/font-awesome.min.css') }}">
    <style>
        h2 {margin:0;} .follow-button{background-color: #55acee;color:white;}
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            @foreach($recommendedUsers as $users)
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="col-sm-3">
                            <img src="{{ $users->profile_image_url }}" class="img img-circle" alt="">
                        </div>
                        <div class="col-sm-9">
                            <h2>{{ $users->name }}</h2>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <p>
                            {!! $users->status->text !!}
                        </p>
                        @if(!$users->following)
                            <form action="{{ URL::to('/follow/'.$users->screen_name) }}" method="post">
                                {!! csrf_field() !!}
                                <button type="submit" target="_blank" class="btn btn-info follow-button">Follow him</button>
                            </form>
                        @else
                            <form action="{{ URL::to('/unfollow/'.$users->screen_name) }}" method="post">
                                {!! csrf_field() !!}
                                <button type="submit" class="btn btn-danger">Unfollow him</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <a href="{{ URL::to('/') }}">Go to Homepage</a>
        </div>
    </div>
</body>
</html>