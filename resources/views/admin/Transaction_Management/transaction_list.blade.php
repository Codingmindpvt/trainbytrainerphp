@extends('layouts.admin.inner')
@section('content')
<!-- start content area here -->
<div class="content_area">

    <div class="tables_area">
        <h2 class="pull-left">Transaction  Management > Program</h2>
        <div class="view-box">
            <p class="pr-2">From</p>
            <div class="calender-view">
                <i class="fa fa-calendar  select-angle-calender" aria-hidden="true"></i>
                <input type="date" class="form-control" name="from" placeholder="From" required="">
            </div>
            <p class="px-2">To</p>
            <div class="calender-view">
                <i class="fa fa-calendar  select-angle-calender" aria-hidden="true"></i>
                <input type="date" class="form-control" name="to" placeholder="To" required="">
            </div>
            &nbsp;
            <div class="calender-view ">
                <button type="submit" class="btn btn-info"><i class="fa fa-search search-icon" aria-hidden="true"></i></button>
            </div>
        </div>
                <input type="search" class="searchBox" placeholder="Search Here">
                {{--  <a href="{{ route('admin.transaction.list') }}" class="blue_btn yellow_btn pull-right
                text-uppercase">Add New</a> --}}
                <div class="clear"></div>
                <div class="white_box">
                    <div class="table-responsive">
                        <table width="100%" cellspacing="0" cellpadding="0" class="myDataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Buyer</th>
                                    <th>Coach Name</th>
                                    <th>Date</th>
                                    <th>Price</th>
                                    <th>Order ID</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i  = ($transactions->perPage() * ($transactions->currentPage() - 1)) + 1;
                                ?>
                                @foreach( $transactions as $serial_no=>$transaction)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ (isset($transaction['program']['program_name'])) ? ucwords($transaction['program']['program_name']) : "-----"}}
                                    </td>
                                    <td>{{ (isset($transaction['payment']['user']['first_name'])) ? ucwords($transaction['payment']['user']['first_name']." ".$transaction['payment']['user']['last_name']) : "-----"}}
                                    </td>
                                    <td>{{ (isset($transaction['program']['program_user']['first_name'])) ? ucwords($transaction['program']['program_user']['first_name']." ".$transaction['program']['program_user']['last_name']) : "-----"}}
                                    </td>
                                    <td>{{ date('d-m-Y', strtotime($transaction['created_at'])) }}</td>
                                    <td>{{ isset($transaction['program']['price']) ? DEFAULT_CURRENCY . $transaction['program']['price'] : '-----' }}
                                    </td>

                                    <td>{{ $transaction['order_id'] }}</td>
                                    <td><a href="{{ route('admin.transaction.View',$transaction['id']) }}"
                                            class="action_btn"  data-toggle="tooltip"><i class="fa fa-eye" aria-hidden="true"></i></a></td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="paginator">
                        {{ $transactions->links() }}
                    </div>

                </div>

    </div>
    @endsection
