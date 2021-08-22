<!DOCTYPE html>
<html lang="en">

<head>
    <title>Invoice</title>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <div class="container-fluid">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <a href="https://shop.ypsolutionkh.com">
                        <img id="image" style="width: 200px; margin-top: 3px" src="https://shop.ypsolutionkh.com/frontEnd/images/home/logo_shopNex.png" alt="" /></a>
                </td>
                <td>
                    <h2>Invoice</h2>
                </td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td width="49%">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td style="
                          font-family: Verdana, Geneva, sans-serif;
                          font-weight: 600;
                          font-size: 15px;
                        ">
                                            Payment Receipt
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Receipt Number: {{$orderedItems->invoice->code}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td style="
                          font-family: Verdana, Geneva, sans-serif;
                          font-weight: 600;
                          font-size: 15px;
                        ">
                                            ShopNexG
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Our Office: St. 69, Songkat Phsar Daeum Thkov,<br />
                                            Khan Chamka Mon, Phnom Phenh, Cambodia.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="51%" valign="top">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td align="right"></td>
                        </tr>
                        <tr>
                            <td style="
                    font-family: Verdana, Geneva, sans-serif;
                    font-weight: 300;
                    font-size: 13px;
                  " align="right"></td>
                        </tr>
                        <tr>
                            <td style="
                    font-family: Verdana, Geneva, sans-serif;
                    font-weight: 300;
                    font-size: 13px;
                  " align="right">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                Receipt Date : {{$orderedItems->invoice->paid_at}}
                            </td>
                        </tr>
                        <tr>
                            <td style="
                    font-family: Verdana, Geneva, sans-serif;
                    font-weight: 600;
                    font-size: 15px;
                  " align="right">
                                Payer
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                Payment option: {{$orderedItems->invoice->paid_by ==='COD' ? 'Cash On Delivery': 'PayPal'}}
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                {{$orderedItems->invoice->customer->name}}
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                {{$orderedItems->invoice->customer->mobile}}
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                {{$orderedItems->invoice->customer->email}}
                            </td>
                        </tr>
                        <tr>
                            <td style="
                    font-family: Verdana, Geneva, sans-serif;
                    font-weight: 300;
                    font-size: 13px;
                  " align="right">
                                <h4>Shipping Address</h4>
                                @if($orderedItems->invoice->customer->address)
                                {{$orderedItems->invoice->customer->address}}','{{$orderedItems->invoice->customer->pincode}},{{$orderedItems->invoice->customer->state}},{{$orderedItems->invoice->customer->city}},{{$orderedItems->invoice->customer->country}}
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <div class="row">
            <div class="col-md-12">
                <table style="border: 1px solid #dcdada" class="table table-bordered data-table">
                    <thead style="background-color: aliceblue">
                        <tr>
                            <th style="font-weight: 400">#</th>
                            <th style="font-weight: 400">SKU</th>
                            <th style="font-weight: 400">Item Name</th>
                            <th style="font-weight: 400">Item Color</th>
                            <th style="font-weight: 400">Item Size</th>
                            <th style="font-weight: 400">Unit Price</th>
                            <th style="font-weight: 400">Quantity</th>
                            <th style="font-weight: 400">Condition</th>
                        </tr>
                    </thead>
                    <tbody style="background-color: #bfbbb436">
                        <?php $subTotal = 0; ?>
                        @if(!empty($orderedItems) &&
                        count($orderedItems->orderedItemsDetail) >0 )
                        @foreach($orderedItems->orderedItemsDetail as $key =>
                        $orderedItem)
                        <tr style="border-bottom: 1px solid #000">
                            <?php $subTotal += $orderedItem->price * $orderedItem->quantity;
                            ?>
                            <td align="center">{{$key+1}}</td>
                            <td align="center">{{ $orderedItem->product_code }}</td>
                            <td align="center">{{ $orderedItem->product_name }}</td>
                            <td align="center">{{ $orderedItem->product_color }}</td>
                            <td align="center">{{ $orderedItem->size }}</td>
                            <td align="center">$ @currency_format($orderedItem->price)</td>
                            <td align="center">{{ $orderedItem->quantity }}</td>
                            <td align="center">{{ $orderedItem->condition }}</td>
                        </tr>
                        @endforeach
                        @endif
                        <tr>
                            <td colspan="6"></td>
                            <td align="center"><strong>SubTotal</strong></td>
                            <td align="center">
                                $ @currency_format($subTotal)
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6"></td>
                            <td align="center"><strong>Discount({{$orderedItems->invoice->discount_rate}}%)</strong></td>
                            <?php $discountAmounted =  ($subTotal * $orderedItems->invoice->discount_rate) / 100; ?>
                            <td align="center"> $ @currency_format($discountAmounted)</td>
                        </tr>
                        <tr>
                            <td colspan="6"></td>
                            <td align="center"><strong>Tax( {{$orderedItems->invoice->tax_rate}} %)</strong></td>
                            <?php $taxedAmount =  ($subTotal * $orderedItems->invoice->taxt_rate) / 100; ?>
                            <td align="center">$ @currency_format($taxedAmount)</td>
                        </tr>
                        <tr>
                            <td colspan="6"></td>
                            <td align="center"><strong>Grand Total</strong></td>
                            <td align="center">$ @currency_format($subTotal - $discountAmounted + $taxedAmount)</td>
                        </tr>
                        <tr>
                            <td colspan="10" align="right">
                                <?php

                                $f = new \NumberFormatter("en", NumberFormatter::SPELLOUT);

                                ?>
                                Total Amount in Words: <strong>{{$f->format($subTotal)}}</strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>Seen and Approved</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p style="height: 40px"></p>
            </div>
        </div>
    </div>
</body>

</html>