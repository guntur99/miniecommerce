<!--sidebar Begins-->
<aside class="admin-sidebar">
    <div class="admin-sidebar-brand">
        <!-- begin sidebar branding-->
        <img class="admin-brand-logo" src="{{ asset('atmos/light/assets/img/logo.png') }}" width="40" alt="">
        <!-- end sidebar branding-->
        <div class="ml-auto">
            <!-- sidebar pin-->
            {{-- <a href="#" class="admin-pin-sidebar btn-ghost btn btn-rounded-circle"></a> --}}
            <!-- sidebar close for mobile device-->
            <a href="#" class="admin-close-sidebar"></a>
        </div>
    </div>
    <div class="admin-sidebar-wrapper js-scrollbar">
        <ul class="menu">

            <li class="menu-item ">
                <a href="{{ route('dashboard') }}" class="menu-link">
                    <span class="menu-label">
                        <span class="menu-name">Dashboard</span>
                    </span>
                    <span class="menu-icon">
                        <i class="icon-placeholder mdi mdi-view-dashboard-outline "></i>
                    </span>
                </a>
            </li>

            <!-- Role for Customer -->
            @if (Auth::user()->role == 1)
                <li class="menu-item ">
                    <a href="{{ route('index.product.customer') }}" class="menu-link">
                        <span class="menu-label">
                            <span class="menu-name">Products</span>
                        </span>
                        <span class="menu-icon">
                            <i class="icon-placeholder mdi mdi-ballot "></i>
                        </span>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="#" class="open-dropdown menu-link">
                        <span class="menu-label">
                            <span class="menu-name">Transactions
                                <span class="menu-arrow"></span>
                            </span>
                        </span>
                        <span class="menu-icon">
                            <i class="icon-placeholder mdi mdi-script "></i>
                        </span>
                    </a>
                    <!--submenu-->
                    <ul class="sub-menu">

                        <li class="menu-item ">
                            <a href="{{ route('checkout.transaction.customer') }}" class=" menu-link">
                                <span class="menu-label">
                                    <span class="menu-name">Checkout</span>
                                </span>
                                <span class="menu-icon">
                                    <i class="icon-placeholder mdi mdi-script-text "></i>
                                </span>
                            </a>
                        </li>

                        <li class="menu-item ">
                            <a href="{{ route('orderList.customer') }}" class=" menu-link">
                                <span class="menu-label">
                                    <span class="menu-name">History</span>
                                </span>
                                <span class="menu-icon">
                                    <i class="icon-placeholder mdi mdi-receipt "></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

            <!-- Role for Seller -->
            @elseif (Auth::user()->role == 2)
                <li class="menu-item ">
                    <a href="#" class="open-dropdown menu-link">
                        <span class="menu-label">
                            <span class="menu-name">Products
                                <span class="menu-arrow"></span>
                            </span>
                        </span>
                        <span class="menu-icon">
                            <i class="icon-placeholder mdi mdi-ballot "></i>
                        </span>
                    </a>
                    <!--submenu-->
                    <ul class="sub-menu">

                        <li class="menu-item ">
                            <a href="{{ route('create.products') }}" class=" menu-link">
                                <span class="menu-label">
                                    <span class="menu-name">Create New</span>
                                </span>
                                <span class="menu-icon">
                                    <i class="icon-placeholder  mdi mdi-playlist-plus "></i>
                                </span>
                            </a>
                        </li>

                        <li class="menu-item ">
                            <a href="{{ route('show.products') }}" class=" menu-link">
                                <span class="menu-label">
                                    <span class="menu-name">All Product</span>
                                </span>
                                <span class="menu-icon">
                                    <i class="icon-placeholder  mdi mdi-format-list-bulleted-type "></i>
                                </span>
                            </a>
                        </li>

                        {{-- <li class="menu-item ">
                            <a href="{{ route('index.product.seller') }}" class=" menu-link">
                                <span class="menu-label">
                                    <span class="menu-name">Market</span>
                                </span>
                                <span class="menu-icon">
                                    <i class="icon-placeholder  mdi mdi-card-bulleted "></i>
                                </span>
                            </a>
                        </li> --}}
                    </ul>
                </li>

                <li class="menu-item ">
                    <a href="#" class="open-dropdown menu-link">
                        <span class="menu-label">
                            <span class="menu-name">Transactions
                                <span class="menu-arrow"></span>
                            </span>
                        </span>
                        <span class="menu-icon">
                            <i class="icon-placeholder mdi mdi-script "></i>
                        </span>
                    </a>
                    <!--submenu-->
                    <ul class="sub-menu">

                        {{-- <li class="menu-item ">
                            <a href="{{ route('checkout.transaction.seller') }}" class=" menu-link">
                                <span class="menu-label">
                                    <span class="menu-name">Checkout</span>
                                </span>
                                <span class="menu-icon">
                                    <i class="icon-placeholder  mdi mdi-script-text "></i>
                                </span>
                            </a>
                        </li> --}}

                        <li class="menu-item ">
                            <a href="{{ route('index.transaction.seller') }}" class=" menu-link">
                                <span class="menu-label">
                                    <span class="menu-name">Transaction List</span>
                                </span>
                                <span class="menu-icon">
                                    <i class="icon-placeholder  mdi mdi-format-list-checks "></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item ">
                    <a href="{{ route('report.seller') }}" class="menu-link">
                        <span class="menu-label">
                            <span class="menu-name">Report</span>
                        </span>
                        <span class="menu-icon">
                            <i class="icon-placeholder mdi mdi-receipt "></i>
                        </span>
                    </a>
                </li>
            @endif
        </ul>

    </div>

</aside>
<!--sidebar Ends-->
