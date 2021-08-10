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
            <input type="hidden" value="{{ $orderedItems->invoice->id }}" name="invoiceId" />
            <div class="btn-wrapper" style="width: 100%;">
                <a class="btn pull-right btn-default edit-invoice-qty" data-toggle="modal" data-target=".edit-quantity"><i class="bi bi-pencil " style="font-size: 1.5rem;"></i></a>
                <a href="{{ route('invoice-print',['orderedItemsId'=>$orderedItems->id]) }}" class="btn btn-primary pull-right"> Export To PDF</a>
            </div>
        </div>
        <div class="top-wrapper">
            <div class="detail-box-wrapper">
                <div class="box-row">
                    <div class="box-label">Grand Total</div>
                    <div class="box-value grand-total">$ @currency_format($orderedItems->grand_total)</div>
                </div>
                <div class="box-row">
                    <div class="box-label">Total Quantity</div>
                    <div class="box-value">{{$orderedItems->total_qty}}</div>
                </div>
                <div class="box-row">
                    <div class="box-label">Discount</div>
                    <div class="box-value">@currency_format($orderedItems->invoice->discount_rate)%</div>
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
                    <div class="box-value">@currency_format($orderedItems->coupon_amount) %</div>
                </div>
            </div>
            @if(!empty($orderedItems->shippingAddress)>0)
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
            @endif

        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item SKU</th>
                        <th>Item Name</th>
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
                        <td>{{ $orderedItem->product_code }}</td>
                        <td>{{ $orderedItem->product_name }}</td>
                        <td>{{ $orderedItem->product_color }}</td>
                        <td>{{ $orderedItem->size }}</td>
                        <td>$ @currency_format($orderedItem->price)</td>
                        <td>{{ $orderedItem->quantity }}</td>
                        <td>{{ $orderedItem->condition }}</td>
                        <td>{{ $orderedItem->product->category->name }}</td>
                        <td>{{ $orderedItem->created_at }}</td>
                    </tr>
                    @endforeach
                    @endif
                    <tr>
                        <td colspan="8"></td>
                        <td class="text-center">Invoice Code: <strong>{{ $orderedItems->invoice->code }}</strong></td>
                        <td>
                            @if(!empty($orderedItems->invoice) && $orderedItems->invoice->is_paid !==1)
                            <a href="{{ route('invoice-paid',['invoiceId'=> $orderedItems->invoice->id]) }}" class="btn">Pay</a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade edit-quantity" tabindex="-1" role="dialog" aria-labelledby="Quantity">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Quantity</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <input type="number" name="quantity" placeholder="Quantity" class="form-control">
                        </div>
                        <div class="form-group">
                            <select name="orderedItem" class="form-control">
                                <option value="0">select item</option>
                            </select>
                            <div class="error"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save-btn-qty">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jsblock')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery.ui.custom.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<script>
    const url = "{{ url('/admin/invoices/') }}"
    const invoiceId = jQuery('input[name="invoiceId"]').val();
    jQuery('.edit-invoice-qty').click(function() {
        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            url: `${url}/${invoiceId}/edit`,
            type: 'GET',
            dataType: 'json',
            success: function({
                qty,
                items
            }) {
                const foundItems = items[0].ordered_items_detail

                jQuery('input[name="quantity"]').val(qty)
                let string = ''
                for (item of foundItems) {
                    string += `<option value="${item.id}">${item.product_name}</option>`
                }
                jQuery('select[name="orderedItem"]').append(string);
            },
            error: function(error) {}
        })
    })
    jQuery('.save-btn-qty').click(function() {
        const url = "{{ url('/admin/invoices/') }}";
        const val = jQuery('select[name="orderedItem"]').val();
        if (0 === parseInt(val)) {
            jQuery('.error').text('Please select item')
            return
        }
        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            url: `${url}/${invoiceId}/items/${val}`,
            type: 'PATCH',
            data: {
                qty: jQuery('input[name="quantity"]').val()
            },
            dataType: 'json',
            success: function({
                success
            }) {
                // console.log(success, 'ssss')
                jQuery('.edit-quantity').modal('hide');

                if (success) window.location.reload()
            },
            error: function(error) {}
        })
    })
</script>
@endsection