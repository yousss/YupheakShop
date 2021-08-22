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
            <input type="hidden" value="{{ $orderedItems->id }}" name="orderId" />
            <div class="btn-wrapper" style="width: 100%;">
                @if(!empty($orderedItems->invoice) && $orderedItems->invoice->is_paid !==1)
                <a class="btn pull-right btn-default edit-invoice-qty" data-toggle="modal" data-target=".edit-quantity">
                    <i class="bi bi-pencil " style="font-size: 1.5rem;"></i>
                </a>
                @endif
                <a href="{{ route('invoice-print',['orderedItemsId'=>$orderedItems->id]) }}" class="btn btn-primary pull-right"> Export To PDF</a>
            </div>
        </div>
        <div class="top-wrapper">

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
                    <?php $totalPrice = 0;  ?>
                    @if($orderedItems && count($orderedItems->orderedItemsDetail) >0 )
                    @foreach($orderedItems->orderedItemsDetail as $key => $orderedItem)
                    <tr>
                        <?php $totalPrice += ($orderedItem->price * $orderedItem->quantity);  ?>
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
                        <td class="text-center">Sub Total</td>
                        <td>$ <strong>@currency_format($totalPrice)</strong></td>
                    </tr>
                    <tr>
                        <td colspan="8">
                        </td>
                        <td class="text-center">Discount({{$orderedItems->invoice->discount_rate}}%)</td>
                        <td>
                            <?php $subTotal =  ($totalPrice * $orderedItems->invoice->discount_rate) / 100; ?>
                            $ @currency_format($subTotal)
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8">
                        </td>
                        <td class="text-center">Tax( {{ $orderedItems->invoice->tax_rate}} %)</td>
                        <td>
                            <?php $taxedAmount = ($totalPrice * $orderedItems->invoice->tax_rate) / 100; ?>
                            $ @currency_format($taxedAmount)
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8">
                        </td>
                        <td class="text-center">Grand Total</td>
                        <td>
                            $ @currency_format($totalPrice - $subTotal + $taxedAmount)
                        </td>
                    </tr>
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
                        <div style="display: flex;" class="form-group">
                            <input type="number" name="quantity" placeholder="Quantity" class="form-control">
                            <select class="form-control calculated">
                                <option value="1">addition</option>
                                <option value="2">substraction</option>
                            </select>
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
    <div class="alert-container">
        <div class="alert">
            The ordered item amount is not enough
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
                jQuery('select[name="orderedItem"]').empty()
                jQuery('select[name="orderedItem"]').append(string);
            },
            error: function(error) {}
        })
    })
    jQuery('.save-btn-qty').click(function() {
        const url = "{{ url('/admin/invoices/') }}";
        const val = jQuery('select[name="orderedItem"]').val();
        const orderId = jQuery('input[name="orderId"]').val();
        if (0 === parseInt(val)) {
            jQuery('.error').text('Please select item')
            return
        }
        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            url: `${url}/${invoiceId}/items/${val}/orders/${orderId}`,
            type: 'PATCH',
            data: {
                qty: jQuery('input[name="quantity"]').val(),
                sign: jQuery('.calculated').val()
            },
            dataType: 'json',
            success: function({
                success,
                message
            }) {
                jQuery('.edit-quantity').modal('hide');
                if (success) window.location.reload()

                var alert = $(".alert-container");
                alert.slideDown();
                window.setTimeout(function() {
                    alert.slideUp();
                }, 2500);
            },
            error: function(error) {}
        })
    })
    $(function() {
        var alert = $(".alert-container");
        alert.hide();
    });
</script>
@endsection