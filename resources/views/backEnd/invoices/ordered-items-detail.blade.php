@extends('backEnd.layouts.master')
@section('title','ordered items detail')
@section('content')
<div id="breadcrumb">
    <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom">
        <i class="icon-home"></i>Home</a>
    <a href="{{route('invoices.index')}}" class="tip-bottom">Invoices</a>
    <a href="{{route('invoices.index')}}" class="current">Ordered items</a>
</div>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="icon-th"></i>
            </span>
            <h5>List ordered items</h5>
        </div>
        <div class="top-wrapper">
            <div class="detail-box-wrapper">
                <div class="box-row">
                    <div class="box-label">Grand Total</div>
                    <div class="box-value grand-total">$ @currency_format($orderedItems->grand_total)</div>
                </div>
                <div class="box-row">
                    <div class="box-label">Total Quantity</div>
                    <div class="box-value">$ @currency_format($orderedItems->total_qty)</div>
                </div>
                <div class="box-row">
                    <div class="box-label">Shipping Fee</div>
                    <div class="box-value">$ @currency_format($orderedItems->shipping_charges)</div>
                </div>
                <div class="box-row">
                    <div class="box-label">Paid By</div>
                    <div class="box-value">{{$orderedItems->payment_method}}</div>
                </div>
                <div class="box-row">
                    <div class="box-label">Coupon Applied</div>
                    <div class="box-value">$ @currency_format($orderedItems->coupon_amount)</div>
                </div>
            </div>
            <div class="detail-box-wrapper">
                <strong>Delivery Address</strong>
                <div class="box-row">
                    <div class="box-label">Place Name</div>
                    <div class="box-value ">{{ $orderedItems->shippingAddress->name }}</div>
                </div>
                <div class="box-row">
                    <div class="box-label">Address</div>
                    <div class="box-value">{{ $orderedItems->shippingAddress->address }}</div>
                </div>
                <div class="box-row">
                    <div class="box-label">City</div>
                    <div class="box-value">{{ $orderedItems->shippingAddress->city }}</div>
                </div>
                <div class="box-row">
                    <div class="box-label">State</div>
                    <div class="box-value">{{ $orderedItems->shippingAddress->state }}</div>
                </div>
                <div class="box-row">
                    <div class="box-label">Country</div>
                    <div class="box-value">{{ $orderedItems->shippingAddress->country }}</div>
                </div>
                <div class="box-row">
                    <div class="box-label">Postal Code</div>
                    <div class="box-value">{{ $orderedItems->shippingAddress->pincode }}</div>
                </div>
            </div>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item Name</th>
                        <th>Item SKU</th>
                        <th>Item Color</th>
                        <th>Item Size</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Condition</th>
                        <th>Grouped By</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @if($orderedItems && count($orderedItems->orderedItemsDetail) >0 )
                    @foreach($orderedItems->orderedItemsDetail as $key => $orderedItem)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{ $orderedItem->product_name }}</td>
                        <td>{{ $orderedItem->product_code }}</td>
                        <td>{{ $orderedItem->product_color }}</td>
                        <td>{{ $orderedItem->size }}</td>
                        <td>$ @currency_format($orderedItem->price)</td>
                        <td>{{ $orderedItem->quantity }}</td>
                        <td>{{ $orderedItem->condition }}</td>
                        <td>{{ $orderedItem->product->p_name }}</td>
                        <td>{{ $orderedItem->created_at }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('jsblock')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery.ui.custom.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.uniform.js')}}"></script>

<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/matrix.js')}}"></script>
<script src="{{asset('js/matrix.tables.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
    $(".deleteRecord").click(function() {
        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }, function() {
            window.location.href = "/admin/" + deleteFunction + "/" + id;
        });
    });
</script>
@endsection