<script src="{{ asset('atmos/light/assets/vendor/jquery/jquery.min.js') }}"   ></script>
<script src="{{ asset('atmos/light/assets/vendor/jquery-ui/jquery-ui.min.js') }}"   ></script>
<script src="{{ asset('atmos/light/assets/vendor/popper/popper.js') }}"   ></script>
<script src="{{ asset('atmos/light/assets/vendor/bootstrap/js/bootstrap.min.js') }}"   ></script>
<script src="{{ asset('atmos/light/assets/vendor/select2/js/select2.full.min.js') }}"   ></script>
<script src="{{ asset('atmos/light/assets/vendor/jquery-scrollbar/jquery.scrollbar.min.js') }}"   ></script>
<script src="{{ asset('atmos/light/assets/vendor/listjs/listjs.min.js') }}"   ></script>
<script src="{{ asset('atmos/light/assets/vendor/moment/moment.min.js') }}"></script>
<script src="{{ asset('atmos/light/assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('atmos/light/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('atmos/light/assets/vendor/bootstrap-notify/bootstrap-notify.min.js') }}"   ></script>
<script src="{{ asset('atmos/light/assets/js/atmos.min.js') }}"></script>
<script src="{{ asset('atmos/light/assets/vendor/blockui/jquery.blockUI.js') }}"></script>
<script src="{{ asset('atmos/light/assets/js/blockui-data.js') }}"></script>
<script src="{{ asset('atmos/light/assets/js/axios.min.js') }}"></script>
<script src="{{ asset('atmos/light/assets/js/main.js') }}"></script>
<script src="{{ asset('atmos/light/assets/vendor/trumbowyg/trumbowyg.min.js') }}"></script>
<script src="{{ asset('atmos/light/assets/vendor/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('atmos/light/assets/js/form-data.js') }}"></script>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
{{-- <script>window.jQuery || document.write('<script src="{{ asset('trumbowyg/js/vendor/jquery-3.3.1.min.js') }}"><\/script>')</script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.5/xlsx.full.min.js"></script>

@yield('custom_script')
<script>
    var cartCount = 0;
    function addToCart(data){
        cartCount += 1;
        $("#cart-counter").removeClass('d-none');
        $("#checkout-btn").removeClass('d-none');
        $("#product-counter").html(`<div id="product-counter" class="text-overline m-b-5">Product List: `+cartCount+` item(s)</div>`);
        $("#add-to-cart"+data.id).html(`<div class="bg-gray-200 m-t-10 p-all-10 text-overline text-success">  Added</div>`);
        $("#product-list").append(`
            <a href="#" class="d-block m-b-10">
                <div class="card">
                    <div class="card-body"> <i class="mdi mdi-cart text-dark"></i> `+data.name+`</div>
                </div>
            </a>`);
    };
</script>
</body>
</html>
