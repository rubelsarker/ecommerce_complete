<aside class="main-sidebar  sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a target="_blank" href="{{url('/')}}" class="brand-link">
        <img src="{{url('')}}/public/backend/dist/img/rs-logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Ecommerce</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{url('')}}/public/backend/dist/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth('admin')->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.home')}}" class="nav-link {{ Request::is('admin/home') ? 'active' : ''}} ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.category.index')}}" class="nav-link {{ Request::is('admin/category*') ? 'active' : ''}} ">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.subcategory.index')}}" class="nav-link {{ Request::is('admin/subcategory*') ? 'active' : ''}} ">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Subcategory
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.sub-subcategory.index')}}" class="nav-link {{ Request::is('admin/sub-subcategory*') ? 'active' : ''}} ">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Sub Subcategory
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.brand.index')}}" class="nav-link {{ Request::is('admin/brand*') ? 'active' : ''}} ">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Brand
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.color.index')}}" class="nav-link {{ Request::is('admin/color*') ? 'active' : ''}} ">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Color
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.size.index')}}" class="nav-link {{ Request::is('admin/size*') ? 'active' : ''}} ">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Size
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.unit.index')}}" class="nav-link {{ Request::is('admin/unit*') ? 'active' : ''}} ">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Unit
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.product.index')}}" class="nav-link {{ Request::is('admin/product*') ? 'active' : ''}} ">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Product
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.banner.index')}}" class="nav-link {{ Request::is('admin/banner*') ? 'active' : ''}} ">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Banner
                        </p>
                    </a>
                </li>
                <li class="nav-header">System</li>
                <li class="nav-item">
                    <a href="{{route('admin.setting')}}" class="nav-link {{ Request::is('admin/website-setting*') ? 'active' : ''}} ">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Setting
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>