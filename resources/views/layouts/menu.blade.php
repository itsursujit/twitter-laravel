<li class="{{ Request::is('home*') ? 'active' : '' }}">
   <a href="{!! url('/home') !!}">Dashboards</a>
</li>
<li class="{{ (Request::is('categories*') || Request::is('category*') ) ? 'active' : '' }}">
   <a href="{!! url('/categories') !!}">Categories</a>
</li>
<li class="{{ Request::is('product*') ? 'active' : '' }}">
   <a href="{!! url('/products') !!}">Products</a>
</li>
<li class="{{ Request::is('kaligard*') ? 'active' : '' }}">
   <a href="{!! url('/kaligards') !!}">Kaligards</a>
</li>
<li class="{{ Request::is('workAssignment*') ? 'active' : '' }}">
   <a href="{!! url('/workAssignments') !!}">Assignments</a>
</li>
<li class="{{ Request::is('purchaseTransaction*') ? 'active' : '' }}">
   <a href="{!! url('/purchaseTransactions') !!}">Purchase</a>
</li>
<li class="{{ Request::is('materialType*') ? 'active' : '' }}">
   <a href="{!! url('/materialTypes') !!}">Materials</a>
</li>