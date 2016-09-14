<div class="list-group">
    <div class="list-group-item" data-status="{{ $user->status->id }}">
        <div class="col-sm-3">
            <img class="img img-circle" src="{{ $user->profile_image_url }}" alt="">
        </div>
        <div class="col-sm-9">
            <p>{!! $user->status->text !!}</p>
        </div>
        <div class="clearfix"></div>
    </div>
</div>