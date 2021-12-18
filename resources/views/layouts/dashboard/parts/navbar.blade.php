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
        <li class="nav-item">
            <div class="dropdown">
                <a href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-24px mdi-shopping"></i>
                    <span class="notification-counter"></span>
                </a>

                <div class="dropdown-menu notification-container dropdown-menu-right">
                    <div class="d-flex p-all-15 bg-white justify-content-between border-bottom ">
                        <span class="h5 m-0">Keranjang</span>
                    </div>
                    <div class="notification-events bg-gray-300">
                        <div class="text-overline m-b-5">Order List</div>
                        {{-- <a href="#" class="d-block m-b-10">
                            <div class="card">
                                <div class="card-body"> <i class="mdi mdi-circle text-success"></i> All systems operational.</div>
                            </div>
                        </a>
                        <a href="#" class="d-block m-b-10">
                            <div class="card">
                                <div class="card-body"> <i class="mdi mdi-upload-multiple "></i> File upload successful.</div>
                            </div>
                        </a>
                        <a href="#" class="d-block m-b-10">
                            <div class="card">
                                <div class="card-body">
                                    <i class="mdi mdi-cancel text-danger"></i> Your holiday has been denied
                                </div>
                            </div>
                        </a> --}}
                    </div>

                </div>
            </div>
        </li>
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
