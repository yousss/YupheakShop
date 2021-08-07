@extends('backEnd.layouts.master')
@section('title','Create Invoices')
@section('content')
<div id="breadcrumb">
    <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom">
        <i class="icon-home"></i>Home</a>
    <a href="{{route('invoices.index')}}" class="tip-bottom">Invoices</a>
    <a href="{{route('invoices.create')}}" class="current">Create</a>
</div>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="icon-th"></i>
            </span>
            <h5>Create Invoices</h5>
        </div>
        <div class="widget-content">
            <div class="continer-fluid ordered-item-container">
                <div class="row">
                    <div class="col-md-12">
                        <strong style="text-transform: uppercase; margin:12px 0px;"><i> Items</i></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <table class="table">
                            <thead>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Color</th>
                                <th>Condition</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Made On</th>
                                <th>Made In</th>
                                <th rowspan="5">Detail Items</th>
                            </thead>
                            <tbody>
                                @if(count($items) === 0)
                                <tr>
                                    <td rowspan="13">Item is empty</td>
                                </tr>
                                @else
                                @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->p_code }}</td>
                                    <td>{{ $item->p_name }}</td>
                                    <td>{{ $item->p_color }}</td>
                                    <td>{{$item->is_new }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{!! $item->description !!}</td>
                                    <td>{{ $item->age }}</td>
                                    <td>{{ $item->made_in }}</td>
                                    <td colspan="8">
                                        <table class="table">
                                            <thead>
                                                <th>Price($)</th>
                                                <th>In Stock</th>
                                                <th>SKU</th>
                                                <th>Size</th>
                                                <th>Qty</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                @if(count($item->productAttributes)>0)
                                                @foreach($item->productAttributes as $detail)
                                                <form action="{{ route('add-ordered-items') }}" method="POST">
                                                    <input type="hidden" name="products_id" value="{{ $item->id }}" />
                                                    <input type="hidden" name="product_code" value="{{ $item->p_code }}" />
                                                    <input type="hidden" name="product_name" value="{{ $item->p_name }}">
                                                    <input type="hidden" name="product_color" value="{{ $item->p_color }}">
                                                    <input type="hidden" name="condition" value="{{ $item->is_new ? 'new': 'second hand' }}">
                                                    <tr>
                                                        <td>@currency_format($detail->price)
                                                            <input type="hidden" name="price" value="{{ $detail->price }}" />
                                                        </td>
                                                        <td>{{ $detail->stock }}
                                                            @csrf
                                                            <input type="hidden" name="size" value="{{ $detail->size }}" />
                                                            <input type="hidden" name="product_attribute_id" value="{{ $detail->id }}" />
                                                        </td>
                                                        <td>{{ $detail->sku }}</td>
                                                        <td>{{ $detail->size }}</td>
                                                        <td><input type="text" name="quantity" value="1" class="qty" /></td>
                                                        <td>
                                                            <button type="submit"><i class="bi bi-plus"></i></button>
                                                        </td>
                                                    </tr>
                                                </form>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="6" style="text-align: center;">Empty</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
            <?php
            $total = 0;
            $total_qty = 0;
            $itemIds = '';
            ?>
            @if($newlyAddedItems && count($newlyAddedItems)>0)
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <th>#</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Color</th>
                                <th>Condition</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </thead>
                            <tbody>

                                @foreach($newlyAddedItems as $key => $item)
                                <tr>
                                    <?php $total += ($item->price * $item->quantity);
                                    $total_qty += $item->quantity;
                                    $itemIds .= $item->id . ',';
                                    ?>
                                    <td>{{ $key +1 }}</td>
                                    <td>
                                        {{$item->product_code}}
                                    </td>
                                    <td>
                                        {{$item->product_name}}
                                    </td>
                                    <td>
                                        {{$item->product_color}}
                                    </td>
                                    <td>
                                        {{$item->condition}}
                                    </td>
                                    <td>
                                        $ @currency_format($item->price)
                                    </td>
                                    <td>
                                        {{$item->quantity}}
                                    </td>

                                    <td><a class=".deleteItem" href="{{ route('remove-item-from-invoice',['itemId'=>$item->id, 'amountStock'=>$item->quantity,'productAttributeId'=> $item->product_attribute_id]) }}" class="btn"><i class="bi bi-scissors"></i> </a> </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6"></td>
                                    <td><strong>Total</strong></td>
                                    <td>$ <strong>@currency_format($total)</strong> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
            <div class="container-fluid">
                <form action="{{ route('invoices.store')}}" id="test" method="POST">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <label for="code">Invoice Code:</label>
                                <input type="hidden" value="<?php echo $total ?>" name="amount" />
                                <input type="hidden" value="<?php echo $total_qty ?>" name="total_qty" />
                                <input type="hidden" name="itemIds" value="{{ substr($itemIds,0,-1) }}" />
                                <input readonly type="text" value="{{ $invoiceCode }}" name="code" id="code" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <label for="note">Invoice Note:</label>
                                <div class="value">
                                    <input type="text" name="note" id="note" class="form-control">
                                    @if($errors->has('note'))<p class="email-error-txt error">{{ $errors->first('note') }}</p>@endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <label for="payment_method">Payment Option:</label>
                                <div class="value">
                                    <select type="text" id="payment_method" name="paid_by" class="form-control">
                                        <option value="COD">Cash On Delivery</option>
                                        <option value="Paypal">PayPal</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <label for="discount">Discount(%):</label>
                                <div class="value">
                                    <input type="text" name="discount_amount" id="discount" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @csrf
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <label for="Rate">Tax Rate(%):</label>
                                <div class="value">
                                    <input type="text" name="tax_rate" id="Rate" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <label for="is_paid">Status:</label>
                                <div class="value">
                                    <input type="text" disabled value="{{$is_paid}}" name="is_paid" id="is_paid" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <label for="customer">Customer:</label>
                                <div class="value">
                                    <select name="customer_id" class="form-control user-seleted">
                                        <option value="">Select user </option>
                                        @if(count($users) > 0)
                                        @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @if($errors->has('customer_id'))<p class="email-error-txt error">{{ $errors->first('customer_id') }}</p>@endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <label for="shipping_charges">Shipping Fee:</label>
                                <div class="value">
                                    <input type="text" name="shipping_charges" id="shipping_charges" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <label for="coupon_code">Coupon Code:</label>
                                <div class="value">
                                    <input type="text" name="coupon_code" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <label for="coupon_amount">Coupon Amount:</label>
                                <div class="value">
                                    <input type="text" name="coupon_amount" id="coupon_amount" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <label for="users_email">E-mail:</label>
                                <div class="value">
                                    <input type="text" name="users_email" class="form-control">
                                    @if($errors->has('users_email'))<p class="email-error-txt error">{{ $errors->first('users_email') }}</p>@endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <div class="row shipping-address">
                        <div class="col-md-12">
                            <div class="top-wrapper">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4 col-md-offset-8">
                            <div class="input-group text-right">
                                <button type="submit" class="btn btn-primary">Create Invoice</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade add-address" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Shipping Address</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row input-group">
                                <div class="col-md-2 col-md-offset-2">User E-mail</div>
                                <div class="col-md-6">
                                    <input type="text" name="users_email" class="form-control">
                                    <input type="hidden" name="users_id" class="users-id">
                                </div>
                            </div>
                            <div class="row input-group">
                                <div class="col-md-2 col-md-offset-2">Full Name</div>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control">
                                    <p class="name-error-txt error"></p>
                                </div>
                            </div>
                            <div class="row input-group">
                                <div class="col-md-2 col-md-offset-2">Address</div>
                                <div class="col-md-6">
                                    <input type="text" name="address" class="form-control">
                                    <p class="address-error-txt error"></p>
                                </div>
                            </div>
                            <div class="row input-group">
                                <div class="col-md-2 col-md-offset-2">City</div>
                                <div class="col-md-6">
                                    <input type="text" name="city" class="form-control">
                                    <p class="city-error-txt error"></p>
                                </div>
                            </div>
                            <div class="row input-group">
                                <div class="col-md-2 col-md-offset-2">State</div>
                                <div class="col-md-6">
                                    <input type="text" name="state" class="form-control">
                                    <p class="state-error-txt error"></p>
                                </div>
                            </div>
                            <div class="row input-group">
                                <div class="col-md-2 col-md-offset-2">Country</div>
                                <div class="col-md-6">
                                    <input type="text" name="country" class="form-control">
                                    <p class="country-error-txt error"></p>
                                </div>
                            </div>
                            <div class="row input-group">
                                <div class="col-md-2 col-md-offset-2">Code Postal</div>
                                <div class="col-md-6">
                                    <input type="text" name="pincode" class="form-control">
                                    <p class="pincode-error-txt error"></p>
                                </div>
                            </div>
                            <div class="row input-group">
                                <div class="col-md-2 col-md-offset-2">Mobile</div>
                                <div class="col-md-6">
                                    <input type="text" name="mobile" class="form-control">
                                    <p class="mobile-error-txt error"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary save-btn-address">Save changes</button>
                    </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>

<script>
    jQuery('.datepicker').datepicker({
        dateFormat: 'yy-dd-mm',
        onSelect: function(datetext) {
            var d = new Date(); // for now
            var h = d.getHours();
            h = (h < 10) ? ("0" + h) : h;

            var m = d.getMinutes();
            m = (m < 10) ? ("0" + m) : m;

            var s = d.getSeconds();
            s = (s < 10) ? ("0" + s) : s;

            datetext = datetext + " " + h + ":" + m + ":" + s;
            $('.datepicker').val(datetext);
        }
    });

    function onUserSelected(userId = null, fromBtnSave = false) {
        const url = "{{ route('shippin-addresses') }}";
        if (!fromBtnSave) {
            jQuery('.shipping-address').fadeOut()
        }
        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            url: `${url}?users_id=${userId}`,
            type: 'GET',
            dataType: 'json',
            success: function(datas) {
                const dataExist = datas.shippingAddresses.length > 0;
                let stringVal = '';

                if (datas && dataExist) {
                    jQuery('.shipping-address').fadeIn();
                    for (data of datas.shippingAddresses) {
                        stringVal += `<div class="detail-box-wrapper">
                                    <div class="box-row">
                                        <strong class="box-label">Delivery Address</strong>
                                        <div class="box-value">
                                            <input type="radio" value="${data.id}" class="form-control-sm" name="shipping_address" />
                                        </div>
                                    </div>
                                    <div class="box-row">
                                        <div class="box-label">Place Name</div>
                                        <div class="box-value ">${data.name}</div>
                                    </div>
                                    <div class="box-row">
                                        <div class="box-label">Address</div>
                                        <div class="box-value">${data.address}</div>
                                    </div>
                                    <div class="box-row">
                                        <div class="box-label">City</div>
                                        <div class="box-value">${data.city }</div>
                                    </div>
                                    <div class="box-row">
                                        <div class="box-label">State</div>
                                        <div class="box-value">${data.state}</div>
                                    </div>
                                    <div class="box-row">
                                        <div class="box-label">Country</div>
                                        <div class="box-value">${data.country}</div>
                                    </div>
                                    <div class="box-row">
                                        <div class="box-label">Postal Code</div>
                                        <div class="box-value">${data.pincode}</div>
                                    </div>
                                </div>`;
                    }
                    jQuery('.top-wrapper').empty().append(stringVal)
                } else if (!dataExist) {
                    const address = ` <div class="input-group text-right">
                                    <button type="button" class="btn btn-primary btn-address" data-toggle="modal" data-target=".add-address">Add Shipping Address</button>
                                </div>`;
                    jQuery('.shipping-address').fadeIn();
                    jQuery('.top-wrapper').empty().append(address)
                }
            },
            error: function(error) {
                console.log(error)
            }
        })
    }

    jQuery('.user-seleted').change(function() {
        const userId = jQuery(this).val();
        jQuery('.users-id').val(userId)
        onUserSelected(userId);
    })
    jQuery('.save-btn-address').click(function() {
        const url = "{{ route('shippin-addresses')}}";
        const data = {
            users_id: jQuery('.users-id').val(),
            users_email: jQuery('input[name="users_email"]').val(),
            name: jQuery('input[name="name"]').val(),
            address: jQuery('input[name="address"]').val(),
            city: jQuery('input[name="city"]').val(),
            state: jQuery('input[name="state"]').val(),
            country: jQuery('input[name="country"]').val(),
            pincode: jQuery('input[name="pincode"]').val(),
            mobile: jQuery('input[name="mobile"]').val()
        }

        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            url,
            data,
            type: 'post',
            dataType: 'json',
            success: function(data, status, xhr) {
                if (data?.success && status === 'success') {
                    const users_id = jQuery('.users-id').val();
                    jQuery('.users-id').val('');
                    jQuery('input[name="users_email"]').val('');
                    jQuery('input[name="name"]').val('');
                    jQuery('input[name="address"]').val('');
                    jQuery('input[name="city"]').val('');
                    jQuery('input[name="state"]').val('');
                    jQuery('input[name="country"]').val('');
                    jQuery('input[name="pincode"]').val('');
                    jQuery('input[name="mobile"]').val('');
                    jQuery('.add-address').modal('hide');
                    onUserSelected(users_id, true);
                }
            },
            error: function({
                responseText,
                status
            }) {
                if (status !== 200) {
                    const {
                        errors
                    } = JSON.parse(responseText);
                    if (errors) {
                        if (errors.address) jQuery('.address-error-txt').text(errors.address[0])
                        if (errors.city) jQuery('.city-error-txt').text(errors.city[0])
                        if (errors.mobile) jQuery('.mobile-error-txt').text(errors.mobile[0])
                        if (errors.name) jQuery('.name-error-txt').text(errors.name[0])
                        if (errors.state) jQuery('.state-error-txt').text(errors.state[0])
                        if (errors.country) jQuery('.country-error-txt').text(errors.country[0])
                    }
                }
            }
        })
    })
</script>

@endsection