@extends('backEnd.layouts.master')
@section('title','Invoices')
@section('content')
<div id="breadcrumb">
    <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom">
        <i class="icon-home"></i>Home</a>
    <a href="{{route('invoices.index')}}" class="current">Invoices</a>
</div>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="icon-th"></i>
            </span>
            <h5>List Invoices</h5>
            <a href="{{ route('invoices.create') }}" class="btn btn-primary pull-right">Create</a>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Invoice Code</th>
                        <th>Customer</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Paid By</th>
                        <th>Quantity</th>
                        <th>Tax Included</th>
                        <th>Amount</th>
                        <th>Created At</th>
                        <th>Issued At</th>
                        <th class="action-wrapper">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($invoices) === 0)
                    <tr>
                        <td colspan="12">
                            <h2>No invoice found</h2>
                        </td>
                    </tr>
                    @else
                    @foreach($invoices as $key => $invoice)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>
                            <a href="{{route('orderedItem',['orderedItemsId' => $invoice->order_id])}}" class="link-to-ordered-item"> {{$invoice->code}}</a>
                        </td>
                        <td>
                            {{$invoice->customer->name}}
                        </td>
                        <td>
                            {{$invoice->note}}
                        </td>
                        <td>
                            {{$invoice->is_paid ? 'PAID': 'OUTSTANDING'}}
                        </td>
                        <td>
                            {{$invoice->paid_by}}
                        </td>
                        <td>
                            {{$invoice->total_qty}}
                        </td>
                        <td>
                            {{$invoice->tax_rate === '' ? 'EXCLUDED': 'INCLUSIVE'}}
                        </td>
                        <td>
                            @currency_format($invoice->amount)
                        </td>
                        <td>
                            {{$invoice->created_on}}
                        </td>
                        <td>
                            {{$invoice->issuing_on === '' ? 'OUTSTANDING': $invoice->issuing_on }}
                        </td>
                        <td>

                            <a href=""><i class="bi bi-pencil"></i></a>
                            <a href=""><i class="bi bi-scissors"></i></a>
                        </td>
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