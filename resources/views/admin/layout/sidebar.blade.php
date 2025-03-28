<style>
    @media screen and (max-width: 991.5px) {
        #slidebar li {
            width: 100% !important;
        }
    }

    @media screen and (min-width: 992px) {
        .mobile-only {
            display: none !important;
        }
    }

    /* Ẩn các nút trên header ở màn hình điện thoại */
    @media screen and (max-width: 991.5px) {
        .header-buttons {
            display: none;
        }
    }
</style>
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="white">
            <a href="" class="logo">
                <img src="{{ asset('sgovn.png') }}" alt="navbar brand" class="navbar-brand"
                    style="width: 100px;
                height: auto" height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner" id="slidebar">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item active">
                    <a href="{{ route('admin.{username}.dashboard', ['username' => Auth::user()->username]) }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item mobile-only">
                    <a href="#addCustomer">
                        <i class="fas fa-user-plus"></i>
                        <p>Thêm khách hàng</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Thành phần quản lý</h4>
                </li>


                <li class="nav-item">
                    <a href="{{ route('admin.{username}.store.index', ['username' => Auth::user()->username]) }}">
                        <i class="fas fa-user"></i>
                        <p>Khách hàng</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.{username}.store.index', ['username' => Auth::user()->username]) }}">
                        <i class="fas fa-box"></i>
                        <p>Sản phẩm</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
