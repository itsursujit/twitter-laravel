<li class="{{ Request::is('home*') ? 'active' : '' }}">
   <a href="{!! URL::to('/home') !!}">Dashboards</a>
</li>
<li class="{{ (Request::is('designs*') || Request::is('design*') ) ? 'active' : '' }}">
   <a href="{!! URL::to('/designs') !!}">Designs</a>
</li>
<li class="{{ (Request::is('categories*') || Request::is('category*') ) ? 'active' : '' }}">
   <a href="{!! URL::to('/categories') !!}">Categories</a>
</li>
<li class="{{ Request::is('product*') ? 'active' : '' }}">
   <a href="{!! URL::to('/products') !!}">Products</a>
</li>
<li class="{{ Request::is('kaligard*') ? 'active' : '' }}">
   <a href="{!! URL::to('/kaligards') !!}">Kaligards</a>
</li>
<li class="{{ Request::is('workAssignment*') ? 'active' : '' }}">
   <a href="{!! URL::to('/workAssignments') !!}">Assignments</a>
</li>
<li class="{{ Request::is('purchaseTransaction*') ? 'active' : '' }}">
   <a href="{!! URL::to('/purchaseTransactions') !!}">Purchase</a>
</li>
<li class="{{ Request::is('materialType*') ? 'active' : '' }}">
   <a href="{!! URL::to('/materialTypes') !!}">Materials</a>
</li><li class="{{ Request::is('shops*') ? 'active' : '' }}">
    <a href="{!! route('shops.index') !!}">Shops</a>
</li>