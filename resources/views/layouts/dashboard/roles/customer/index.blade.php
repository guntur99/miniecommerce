@extends('layouts.dashboard.app')

@section('content')

    <section class="admin-content" id="menu-search">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">
                    <div class="col-md-8 text-white p-b-30">
                        <h4>All Product</h4>
                        <div class="form-group col-md-6">
                            <form method="GET" action="{{ route('search.products') }}" enctype="multipart/form-data">
                            @csrf
                                <input type="text" class="row form-control" id="search" name="search" placeholder="Search">
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 text-white my-auto p-b-30">
                        <form method="GET" action="{{ route('filter.products') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-row">
                                <div class="form-group mt-3 col-md-8">
                                        <select id="category" name="category" class="form-control js-select2" required>
                                            <option value="0" {{ $filter == 0 ? "selected" : "" }}>All Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $filter == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="submit" class="w-100 mt-3 btn btn-success">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container  pull-up">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-6 col-lg-3 h-100 m-b-30">
                        <div class="card ">

                            <div class="card-body">
                                <div class="text-center">
                                    <h3>{{ $product->name }}</h3>
                                    <p class="text-overline text-muted">{{ $product->category_name }}</p>
                                    <div class="m-b-10">
                                        @if ($product->thumbnail != null)
                                            <img src="{{ asset('atmos/light/assets/img/products/item15.png') }}" class="w-75" alt="">
                                        @else
                                            <img src="{{ asset('atmos/light/assets/img/products/item%20(3).jpg') }}" class="w-75" alt="">
                                        @endif
                                    </div>
                                    <div class="font-weight-bold">
                                        <div>Rp. {{ number_format($product->price, 2) }}</div>
                                        <div class="text-warning" style="font-size: 12px;">Stock: {{ $product->stock }} item(s)</div>
                                    </div>
                                    <hr>
                                        Quantity:
                                    <div class="">
                                        <input type="number" class="form-control" id="quantity{{ $product->id }}" name="quantity" onkeydown="return false;" value="1" min="1" max="{{ $product->stock }}">
                                    </div>
                                    <div id="add-to-cart{{ $product->id }}">
                                        <button type="button" onclick="addToCart({{ $product }})" class="w-100 mt-3 btn btn-dark">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@section('custom_script')
<script src="{{ asset('atmos/light/assets/vendor/DataTables/datatables.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script>

</script>
@endsection
