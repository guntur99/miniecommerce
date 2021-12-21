@extends('layouts.dashboard.app')

@section('content')

    <section class="admin-content" id="menu-search">
        <div class="bg-dark m-b-30">
             <div class="container">
                <div class="row p-b-60 p-t-60">

                    <div class="col-md-6 text-white p-b-30">
                        <div class="media">
                            <div class="avatar avatar mr-3">
                                <div class="avatar-title bg-success rounded-circle mdi mdi-currency-usd  ">

                                </div>
                            </div>
                            <div class="media-body">
                                <h1>History </h1>
                            </div>
                        </div>

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
                                    <div class="col-md-8 my-auto">
                                        <h4 class="m-0">Summary</h4>
                                    </div>
                                    <div class="col-md-4 text-right my-auto">
                                        <form method="GET" action="{{ route('filter.transactions') }}" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-row">
                                                <div class="form-group col-md-4"></div>
                                                <div class="form-group mt-3 col-md-4 text-center">
                                                        <select id="filter_date" name="filter_date" class="form-control js-select2" required>
                                                            <option value="0" {{ $filter == 0 ? 'selected' : '' }}>All</option>
                                                            <option value="1" {{ $filter == 1 ? 'selected' : '' }}>Daily</option>
                                                            <option value="2" {{ $filter == 2 ? 'selected' : '' }}>Monthly</option>
                                                        </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <button type="submit" class="w-100 mt-3 btn btn-success">Filter</button>
                                                </div>
                                            </div>
                                        </form>
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
                                                            <a href="{{ url("customer/checkout/$transaction->id") }}">
                                                                @if ($transaction->status == 1)
                                                                    <button class="btn btn-danger " > <i class="mdi mdi-cash-usd"></i>  Pay Now</button></a>
                                                                @else
                                                                    <button class="btn btn-dark " > <i class="mdi mdi-eye-settings-outline"></i>  See Detail</button></a>
                                                                @endif
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

@endsection
