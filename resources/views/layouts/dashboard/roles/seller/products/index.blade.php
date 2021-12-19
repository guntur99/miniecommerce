@extends('layouts.dashboard.app')

@section('content')

    <section class="admin-content" id="menu-search">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">
                        <h4>All Product</h4>
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
                                        <div>Rp. {{ $product->price }}</div>
                                        <div class="text-warning" style="font-size: 12px;">Stock: {{ $product->stock }} item(s)</div>
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
