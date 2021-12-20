<!--site header begins-->
<header class="admin-header">

<a href="#" class="sidebar-toggle" data-toggleclass="sidebar-open" data-target="body"> </a>

<nav class=" mr-auto my-auto">
    <ul class="nav align-items-center">

        <li class="nav-item">
            <a class="nav-link  " id="search_id" href="#">
                <i class="mdi mdi-google-assistant mdi-24px align-middle "></i>
                Mini E-Commerce
            </a>
        </li>
    </ul>
</nav>
<nav class=" ml-auto">
    <ul class="nav align-items-center">
        <form method="POST" action="{{ route('create.checkout.customer') }}" enctype="multipart/form-data">
        @csrf
            <li class="nav-item">
                <div class="dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-24px mdi-shopping"></i>
                        <span id="cart-counter" class="notification-counter d-none"></span>
                    </a>

                    <div class="dropdown-menu notification-container dropdown-menu-right">
                        <div class="d-flex p-all-15 bg-white justify-content-between border-bottom ">
                            <span class="h5 m-0">Shopping Cart</span>
                        </div>
                        <div class="notification-events bg-gray-300">
                            <div id="product-counter" class="text-overline m-b-5">Product List: 0 item(s)</div>
                            <div id="product-list"></div>
                            <input hidden class="form-control" id="items" name="items">
                        </div>
                        <div id="checkout-btn" class="mx-2 text-center d-none">
                            <button type="submit" class="w-100 my-2 btn btn-dark">Checkout</button>
                        </div>
                    </div>
                </div>
            </li>

        </form>
        <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#"   role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-sm avatar-online">
                    <span class="avatar-title rounded-circle bg-dark">O</span>
                </div>
            </a>
            <div class="dropdown-menu  dropdown-menu-right"   >
                <a class="dropdown-item" href="{{ route('logout') }}" method="POST" id="logoutLink"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            </div>
        </li>
    </ul>
</nav>
</header>
<!--site header ends -->
<section class="admin-content">
<div class="container">
</div>
</section>
