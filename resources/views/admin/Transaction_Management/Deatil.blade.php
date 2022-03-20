@extends('layouts.admin.inner')
@section('content')
    <!-- start content area here -->
    <div class="content_area">

        <div class="tables_area">
            {{-- <div class="seller-earning-box">
                <div class="earning-text-count">

                    <p>Total Earning  @php
                        $amountArr = 0;
                    @endphp
                    @foreach ($transactions as $totalEarning)
                        @php
                         $totalEarning['program']['price'];
                            $amountArr += $totalEarning['program']['price'];
                        @endphp
                    @endforeach

                    @php


                        $taxValue = number_format((float) ((5 * $amountArr) / 100), 2, '.', '');
                        $subTotal = $amountArr - $taxValue;
                    @endphp
                    <h2>{{ !empty($subTotal) ? DEFAULT_CURRENCY . $subTotal : 0 }}</h2></p>
                    <p>Pending payment</p>
                </div>
            </div> --}}
            <h2 class="pull-left">transaction>>Program
            </h2>
            {{-- <a href="{{ route('admin.transaction.list') }}" class="blue_btn yellow_btn pull-right text-uppercase">Add New</a> --}}
            <div class="clear"></div>
            <div class="white_box">
                <div class="table-responsive">
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Buyer</th>
                                <th>Coach Name</th>
                                <th>Date</th>
                                <th>Price</th>
                                <th>TRANSACTION ID</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i  = ($transactions>perPage() * ($transactions->currentPage() - 1)) + 1;
                            ?>
                            @foreach ($transactions as $serial_no => $transaction)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ isset($transaction['program']['program_name']) ? $transaction['program']['program_name'] : '-----' }}
                                    </td>
                                    <td>{{ isset($transaction['payment']['user']['first_name'])? $transaction['payment']['user']['first_name'] . ' ' . $transaction['payment']['user']['last_name']: '-----' }}</td>
                                        <td>{{ isset($transaction['user']['first_name'])? $transaction['user']['first_name'] .''.$transaction['user']['first_name']:'----'}}</td>
                                        <td>{{ date('d-m-Y', strtotime($transaction['created_at'])) }}</td>
                                        <td>{{ isset($transaction['program']['price']) ? DEFAULT_CURRENCY . $transaction['program']['price'] : '-----' }}</td>

                                    <td>{{ $transaction['order_id'] }}</td>
                                    <td><a href="{{ route('admin.transaction.View',@$transaction->id) }}" class="action_btn"><i class="fa fa-eye" aria-hidden="true"></i></a></td>






                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                {{-- <div class="paginator">
                        {{ $user->links() }}
                    </div> --}}

            </div>

        </div>
    @endsection
