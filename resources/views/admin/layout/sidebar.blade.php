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
                @if (Auth::user()->role_id == 1)
                    <li class="nav-item mobile-only">
                        <a href="#addOA">
                            <i class="fas fa-plus-circle"></i>
                            <p>Thêm OA</p>
                        </a>
                    </li>
                @endif
                <li class="nav-item mobile-only">
                    <a href="#mainWallet">
                        <i class="fas fa-wallet"></i>
                        <p>Ví chính</p>
                    </a>
                </li>
                <li class="nav-item mobile-only">
                    <a href="#subWallet">
                        <i class="fas fa-wallet"></i>
                        <p>Ví phụ</p>
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
                @if (Auth::user()->role_id == 1)
                    <li class="nav-item">
                        <a
                            href="{{ route('admin.{username}.associate.index', ['username' => Auth::user()->username]) }}">
                            <i class="fas fa-user"></i>
                            <p>Cộng sự</p>
                        </a>
                    </li>
                @endif
                {{-- <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#sidebargiaodich">
                        <i class="fas fa-dollar"></i>
                        <p>Giao dịch</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebargiaodich">
                        <ul class="nav nav-collapse">
                            <li>
                                <a
                                    href="{{ route('admin.{username}.transaction.index', ['username' => Auth::user()->username]) }}">
                                    <span class="sub-item">Nạp tiền</span>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('admin.{username}.transfer.index', ['username' => Auth::user()->username]) }}">
                                    <span class="sub-item">Nhận tiền</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarcauhinh">
                        <i class="fas fa-cogs"></i>
                        <p>Cấu hình</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarcauhinh">
                        <ul class="nav nav-collapse">
                            <li class="nav-item">
                                <a
                                    href="{{ route('admin.{username}.product.index', ['username' => Auth::user()->username]) }}">
                                    <span class="sub-item">Danh mục</p>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('admin.{username}.zalo.zns', ['username' => Auth::user()->username]) }}">
                                    <span class="sub-item">Cấu hình OA/ZNS</span>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('admin.{username}.automation.index', ['username' => Auth::user()->username]) }}">
                                    <span class="sub-item">Automation Marketing</span>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('admin.{username}.message.params', ['username' => Auth::user()->username]) }}">
                                    <span class="sub-item">Định dạng tham số Template</span>
                                </a>
                            </li>


                        </ul>
                    </div>
                </li>
                --}}
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarzns">
                        <i class="fas fa-cogs"></i>
                        <p>Truy vấn ZNS</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarzns">
                        <ul class="nav nav-collapse">
                            <li>
                                <a
                                    href="{{ route('admin.{username}.message.znsMessage', ['username' => Auth::user()->username]) }}">
                                    <span class="sub-item">Report ZNS</span>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('admin.{username}.message.znsQuota', ['username' => Auth::user()->username]) }}">
                                    <span class="sub-item">Hạn mức ZNS</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.{username}.message.znsTemplate', ['username' => Auth::user()->username]) }}"
                                    class="check-zalo-oa">
                                    <span class="sub-item">Template ZNS</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
