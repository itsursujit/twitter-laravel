<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="{{ URL::to('/') }}">
                <img src="{{ URL::to('/logo.png') }}" alt="United Gold Mart" style="width: 50px !important;">
                The United Gold Mart
            </a>
        </li>
       @include('layouts.menu')
    </ul>
</div>
