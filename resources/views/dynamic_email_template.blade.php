<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Receipt</title>
</head>

<body>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td colspan="2">
                <a href="https://shop.ypsolutionkh.com">
                    <img id="image" style="width: 200px; margin-top: 3px" src="https://shop.ypsolutionkh.com/frontEnd/images/home/logo_shopNex.png" alt="" /></a>
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
                                    <td style="
                        font-family: Verdana, Geneva, sans-serif;
                        font-weight: 300;
                        font-size: 13px;
                      ">
                                        Receipt Number: {{$invoiceCode}}
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
                                    <td style="
                        font-family: Verdana, Geneva, sans-serif;
                        font-weight: 300;
                        font-size: 13px;
                      ">
                                        Payment option: {{$paidBy}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="
                        font-family: Verdana, Geneva, sans-serif;
                        font-weight: 300;
                        font-size: 13px;
                      "></td>
                                </tr>
                                <tr>
                                    <td style="
                        font-family: Verdana, Geneva, sans-serif;
                        font-weight: 300;
                        font-size: 13px;
                      ">
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
                        <td style="
                  font-family: Verdana, Geneva, sans-serif;
                  font-weight: 300;
                  font-size: 13px;
                " align="right">
                            Receipt Date : {{$paidAt}}
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
                        <td style="
                  font-family: Verdana, Geneva, sans-serif;
                  font-weight: 300;
                  font-size: 13px;
                " align="right">
                            {{$customer}}
                        </td>
                    </tr>
                    <tr>
                        <td style="
                  font-family: Verdana, Geneva, sans-serif;
                  font-weight: 300;
                  font-size: 13px;
                " align="right">
                            {{$customerPhone}}
                        </td>
                    </tr>
                    <tr>
                        <td style="
                  font-family: Verdana, Geneva, sans-serif;
                  font-weight: 300;
                  font-size: 13px;
                " align="right">
                            {{$customerEmail}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td style="
                  font-family: Verdana, Geneva, sans-serif;
                  font-weight: 600;
                  font-size: 13px;
                  border-top: 1px solid #333;
                  border-bottom: 1px solid #333;
                  border-left: 1px solid #333;
                  border-right: 1px solid #333;
                " width="34%" height="32" align="center">
                            Description
                        </td>
                        <td style="
                  font-family: Verdana, Geneva, sans-serif;
                  font-weight: 600;
                  font-size: 13px;
                  border-top: 1px solid #333;
                  border-bottom: 1px solid #333;
                  border-right: 1px solid #333;
                " width="26%" align="center">
                            Bill Amount
                        </td>
                        <td style="
                  font-family: Verdana, Geneva, sans-serif;
                  font-weight: 600;
                  font-size: 13px;
                  border-top: 1px solid #333;
                  border-bottom: 1px solid #333;
                  border-right: 1px solid #333;
                " width="25%" align="center">
                            Tax included
                        </td>
                        <td style="
                  font-family: Verdana, Geneva, sans-serif;
                  font-weight: 600;
                  font-size: 13px;
                  border-top: 1px solid #333;
                  border-bottom: 1px solid #333;
                  border-right: 1px solid #333;
                  border-right: 1px solid #333;
                " width="15%" align="center">
                            Total Amount
                        </td>
                    </tr>
                    <tr>
                        <td style="
                  font-family: Verdana, Geneva, sans-serif;
                  font-weight: 300;
                  font-size: 13px;
                  border-bottom: 1px solid #333;
                  border-left: 1px solid #333;
                  border-right: 1px solid #333;
                " height="32" align="center">
                            {{$itemName}} {{$invoiceCode}}
                        </td>
                        <td style="
                  font-family: Verdana, Geneva, sans-serif;
                  font-weight: 300;
                  font-size: 13px;
                  border-bottom: 1px solid #333;
                  border-right: 1px solid #333;
                " align="center">
                            {{$amount}}
                        </td>
                        <td style="
                  font-family: Verdana, Geneva, sans-serif;
                  font-weight: 300;
                  font-size: 13px;
                  border-bottom: 1px solid #333;
                  border-right: 1px solid #333;
                " align="center">
                            0
                        </td>
                        <td style="
                  font-family: Verdana, Geneva, sans-serif;
                  font-weight: 300;
                  font-size: 13px;
                  border-bottom: 1px solid #333;
                  border-right: 1px solid #333;
                  border-right: 1px solid #333;
                " align="center">
                            {{$amount}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td style="
            font-family: Verdana, Geneva, sans-serif;
            font-weight: 300;
            font-size: 13px;
          " colspan="2">
                Total Amount in Words: <strong>{{$numberInWord}}</strong>
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td style="
            font-family: Verdana, Geneva, sans-serif;
            font-weight: 600;
            font-size: 13px;
          " colspan="2">
                Please Note:
            </td>
        </tr>
        <tr>
            <td style="
            font-family: Verdana, Geneva, sans-serif;
            font-weight: 300;
            font-size: 13px;
          " colspan="2">
                Dear Consumer, the bill payment will reflect in next 48 hours or in
                the next billing cycle, at your service provider&rsquo;s end. Please
                contact customer support for any queries regarding this order.
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td style="
            font-family: Verdana, Geneva, sans-serif;
            font-weight: 600;
            font-size: 13px;
          " colspan="2">
                DECLARATION:
            </td>
        </tr>
        <tr>
            <td style="
            font-family: Verdana, Geneva, sans-serif;
            font-weight: 300;
            font-size: 13px;
          " colspan="2">
                This is not an invoice but only a confirmation of the receipt of the
                amount paid against for the service as described above. Subject to
                terms and conditions mentioned.
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
    </table>
</body>

</html>