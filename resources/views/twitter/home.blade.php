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
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <p>Twitter Feeds</p>
                    </div>
                    <div class="panel-body" style="max-height: 500px;overflow-y: scroll;">
                        @foreach($recommendedUsers as $user)
                            @include('twitter.partial-feed')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <a href="{{ URL::to('/') }}">Go to Homepage</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script>
        //setInterval(function, delay)

    </script>
</body>
</html>