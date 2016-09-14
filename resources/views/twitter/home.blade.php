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
    <script>
        var twitterUsers = {};
    </script>
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
                        <div class="list-group">
                        @include('twitter.partial-feed')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script>
        $(document).ready(function(){
            setInterval(getTwitterFeeds, 20000);
            function getTwitterFeeds(){
                $.ajax({
                     url: "{{ URL::to('/partial') }}",
                     data: $.param(twitterUsers),
                     dataType: 'html',
                     type: 'get',
                     success: function(data) {
                        $('.list-group').prepend(data);
                     }
                 });


            }
        });
    </script>
</body>
</html>