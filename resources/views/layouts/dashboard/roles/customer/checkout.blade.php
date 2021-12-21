@extends('layouts.dashboard.app')

@section('content')

    <section class="admin-content" id="menu-search">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="container">
                    <div class="row p-b-60 p-t-60">
                        <div class="col-md-6 text-white p-b-30">
                            <div class="media">
                                <div class="avatar avatar mr-3">
                                    <div class="avatar-title bg-success rounded-circle mdi mdi-receipt  "></div>
                                </div>
                                <div class="media-body">
                                    <h4 class="m-b-0 mt-2">Transaction Details </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 text-md-right m-b-30 ml-auto">
                            <button class="btn btn-danger {{ $transactions->status == 1 ? "" : "d-none" }}" onclick="payNow()" > <i class="mdi mdi-script-text-outline"></i>Pay Now</button>
                            <div class="media-body">
                                <h4 class="m-b-0 mt-2 text-white {{ $transactions->status == 2 ? "" : "d-none" }}">Status: PAID </h4>
                                <h4 class="m-b-0 mt-2 text-white {{ $transactions->status == 3 ? "" : "d-none" }}">Status: ACCEPTED </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @php
            $amount = 0;
        @endphp
        <section class="pull-up">
            <div class="container" id="printableArea">
                <div class="row"  >
                    <div class="col-md-12 m-b-40">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="assets/img/logos/nytimes.jpg" width="60" class="rounded-circle"
                                             alt="">
                                        <address class="m-t-10">
                                            To,<br>
                                            <span class="h4 font-primary"> {{ $transactions->customer_name }}</span>
                                        </address>
                                    </div>
                                    <div class="col-md-6 text-right my-auto">
                                        <h1 class="font-primary mt-4">TRANSACTION</h1>
                                        <div class="">Code: {{ $transactions->transaction_code == null ? "-" :  "#".$transactions->transaction_code }}</div>
                                        <div class="">Date: {{ $transactions->created_at }}</div>
                                    </div>
                                </div>

                                <div class="table-responsive ">
                                    <table class="table m-t-50 m-b-50">
                                        <thead>
                                        <tr>
                                            <th class="">Product Name</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-right">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($transDetails as $product)
                                        @php
                                            $total  = $product->price * $product->quantity;
                                            $amount += $total;
                                        @endphp
                                            <tr>
                                                <td class="">
                                                    <p class="text-black m-0">{{ $product->product_name }}</p>
                                                    <p class="text-muted">
                                                        {{ $product->product_description }}
                                                    </p>
                                                </td>
                                                <td class="text-center">Rp.{{ number_format($product->price, 2) }}</td>
                                                <td class="text-center">{{ $product->quantity }} item(s)</td>
                                                <td class="text-right">Rp.{{ number_format($total, 2) }}</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td colspan="3" class="text-right">
                                                Total
                                            </td>
                                            <td colspan="2" class="text-right">
                                                Rp.{{ number_format($amount, 2) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right">
                                                Shipping Cost
                                            </td>
                                            <td colspan="2" class="text-right">
                                                Rp.{{ number_format(10000, 2) }}
                                            </td>
                                        </tr>

                                        <tr class="bg-light">
                                            <td colspan="3" class="text-right">
                                                Total
                                            </td>
                                            <td colspan="2" class="text-right">
                                                Rp.{{ number_format($amount+10000, 2) }}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="p-t-10 p-b-20">
                                    <p class="text-muted ">
                                        Services will be invoiced in accordance with the Service Description. You must
                                        pay all undisputed invoices in full within 30 days of the invoice date, unless
                                        otherwise specified under the Special Terms and Conditions. All payments must
                                        reference the invoice number. Unless otherwise specified, all invoices shall be
                                        paid in the currency of the invoice
                                    </p>
                                    <hr>
                                    <div class="text-center opacity-75">
                                        &copy; Mini E-Commerce
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section>

    <div class="modal fade "   id="modalConfirmation" data-backdrop="static"  tabindex="-1" role="dialog"
            aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Transaction Payment</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('update.transaction.customer') }}" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="">
                                <div class="option-box">
                                    <input id="radio-new1" name="bigradios" type="radio" checked>
                                    <label for="radio-new1">
                                        <span class="radio-content">
                                            <span class="h6 d-block">Bank Transfer <span class="badge-soft-primary badge">Available</span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <input type="number" id="transaction_id" name="transaction_id" value="{{ $transactions->id }}" hidden>
                                <input type="number" id="amount" name="amount" hidden>
                                <div class="option-box">
                                    <input id="radio-new2" name="bigradios" disabled type="radio">
                                    <label for="radio-new2">
                                        <span class="radio-content">
                                            <span class="h6 d-block">Others <span class="badge-soft-info badge">Unavailable</span></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-3">
                                <p>Total:</p>
                                <h4>Rp.{{ number_format($amount+10000, 2) }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <a href="#" class="btn btn-secondary" data-dismiss="modal" aria-label="Close" >Cancel</a>
                        <button type="submit" class="btn btn-success">Pay Transaction</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('custom_script')
<script>
    var amount = @json($amount);
    $('#amount').val(amount);

    function payNow(){
        $('#modalConfirmation').modal('show');
    }
</script>
@endsection
