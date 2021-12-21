@extends('layouts.dashboard.app')

@section('content')

    <section class="admin-content" id="menu-search">
        <div class="bg-dark m-b-30">
             <div class="container">
                <div class="row p-b-60 p-t-60">

                    <div class="col-md-6 text-white p-b-30">
                        <h4>Transaction List</h4>
                    </div>
                </div>
            </div>
        </div>
        <section class="pull-up">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row m-b-20">
                                    <div class="col-md-6 my-auto">
                                        <h4 class="m-0"></h4>
                                    </div>
                                    <div class="col-md-6 text-right my-auto">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-12 p-0">

                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead class="">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Code</th>
                                                    <th scope="col">Order by</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($transactions as $transaction)
                                                    <tr>
                                                        <td class="align-middle">
                                                            <div class="avatar avatar-xs ">
                                                                <span class="avatar-title bg-{{ $transaction->status == 1 ? 'warning' : 'dark' }} rounded-circle">{{ substr($transaction->customer_name,0,1) }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">{{ $transaction->created_at }}</td>
                                                        <td class="align-middle">{{ $transaction->transaction_code }}</td>
                                                        <td class="align-middle">{{ $transaction->customer_name }}</td>
                                                        <td class="align-middle"><span class=" text-{{ $transaction->status == 1 ? 'danger' : 'success' }}">
                                                            <i class="mdi mdi-close-circle "></i> {{ $transaction->status_name }}</span>
                                                        </td>
                                                        <td class="align-middle"><h6 class=" m-0">{{ $transaction->amount == null ? "-" : "Rp.".number_format($transaction->amount, 2) }}</h6></td>
                                                        <td class="align-middle">
                                                            <a href="{{ url("seller/transaction/$transaction->id") }}">
                                                                <button class="btn btn-dark " > <i class="mdi mdi-eye-settings-outline"></i>  See Detail</button>
                                                            </a>
                                                            <button class="btn btn-success " onclick="acceptOrder({{ $transaction->id }})"> <i class="mdi mdi-cash-usd"></i>  Accept</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form method="POST" action="{{ route('accept.transaction.seller') }}" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="px-3 pt-3 text-center">
                            <div class="event-type warning">
                                <div class="event-indicator ">
                                    <i class="mdi mdi-exclamation text-white" style="font-size: 60px"></i>
                                </div>
                            </div>
                            <h3 class="pt-3">Are you sure?</h3>
                            <input type="number" id="transaction_id" name="transaction_id" hidden>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <a href="#" class="btn btn-secondary" data-dismiss="modal" aria-label="Close" >cancel</a>
                        <button type="submit" class="btn btn-success">Accept Order</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('custom_script')
<script>

    function acceptOrder(id){
        $('#transaction_id').val(id);
        $('#modalConfirmation').modal('show');
    }
</script>
@endsection
