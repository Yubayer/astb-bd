<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.profile.index') }}">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">ASTB-BD</div>
</a>


<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="{{ route('home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Home</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>


<!-- Nav Item - Profile Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsProfile"
        aria-expanded="true" aria-controls="collapsProfile">
        <i class="fas fa fa-user"></i>
        <span>Profile</span>
    </a>
    <div id="collapsProfile" class="collapse {{ Request::is('admin/profile*') ? 'show': '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Profile:</h6>
            <a class="collapse-item {{ Request::is('admin/profile') ? 'bg-info text-white': '' }}" 
            href="{{ route('admin.profile.index') }}">Index</a>
            <a class="collapse-item {{ Request::is('admin/profile/edit') ? 'bg-info text-white': '' }}" 
            href="{{ route('admin.profile.edit') }}">Edit</a>
        </div>
    </div>
</li>

<!-- Nav Item - Collection Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsCollection"
        aria-expanded="true" aria-controls="collapsCollection">
        <i class="fas fa-fw fa-cog"></i>
        <span>Collection</span>
    </a>
    <div id="collapsCollection" class="collapse {{ Request::is('admin/collection*') ? 'show': '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Collection:</h6>
            <a class="collapse-item {{ Request::is('admin/collection') ? 'bg-info text-white': '' }}" 
            href="{{ route('admin.collection.index') }}">Index</a>
            <a class="collapse-item {{ Request::is('admin/collection/create') ? 'bg-info text-white': '' }}" 
            href="{{ route('admin.collection.create') }}">Add New</a>
        </div>
    </div>
</li>

<!-- Nav Item - Product Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsProduct"
        aria-expanded="true" aria-controls="collapsProduct">
        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
        <span>Product</span>
    </a>
    <div id="collapsProduct" class="collapse {{ Request::is('admin/product*') ? 'show': '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Product:</h6>
            <a class="collapse-item {{ Request::is('admin/product') ? 'bg-info text-white': '' }}"
             href="{{ route('admin.product.index') }}">Index</a>
            <a class="collapse-item {{ Request::is('admin/product/create') ? 'bg-info text-white': '' }}"
             href="{{ route('admin.product.create') }}">Create New</a>
        </div>
    </div>
</li>

<!-- Nav Item - Product Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsSettings"
        aria-expanded="true" aria-controls="collapsSettings">
        <i class="fas fa-fw fa-cog"></i>
        <span>Settings</span>
    </a>
    <div id="collapsSettings" class="collapse {{ Request::is('admin/product*') ? 'show': '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Settings:</h6>
            <a class="collapse-item {{ Request::is('admin/settings') ? 'bg-info text-white': '' }}"
             href="{{ route('admin.settings.index') }}">Index</a>
        </div>
    </div>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>