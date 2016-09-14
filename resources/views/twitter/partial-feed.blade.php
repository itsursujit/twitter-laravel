@foreach($recommendedUsers as $user)
    <script>
        delete twitterUsers['user_'+ "{{ $user->id }}"];
        twitterUsers['user_'+ "{{ $user->id }}"] = "{{ $user->status->id }}";
    </script>
<div class="list-group-item" data-status="{{ $user->status->id }}">
    <div class="col-sm-3">
        <img class="img img-circle" src="{{ $user->profile_image_url }}" alt="">
    </div>
    <div class="col-sm-9">
        <p>{!! $user->status->text !!}</p>
        <a href="{{ 'http://twitter.com/'.$user->screen_name.'/status/'.$user->status->id }}" target="_blank" > View Tweet</a>
    </div>
    <div class="clearfix"></div>
</div>
@endforeach