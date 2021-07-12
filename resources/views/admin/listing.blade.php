@extends('layouts.layout')

@section('content')
    <div class="container">
        @if(\Illuminate\Support\Facades\Session::has('success'))
            <div class="alert alert-success">
                {{\Illuminate\Support\Facades\Session::get('success')}}
            </div>
        @endif
        <h1><a href="{{ url('admin') }}">Invoices</a>   | <a href="{{ url('admin/csv') }}">Files</a></h1>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Sr. No</th>
                    <th>Activity Date</th>
                    <th>Invoice Date</th>
                    <th>Tech Name</th>
                    <th>Work Location</th>
                    <th>Ticket Number</th>
                    <th>File</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
               @foreach($invoices as $invoice)
                   <tr>
                       <td>
                           {{ $loop->iteration }}
                       </td>
                       <td>
                           {{ formatDate($invoice->activity_date) }}
                       </td>
                       <td>
                           {{ formatDate($invoice->invoice_date) }}
                       </td>
                       <td>
                           {{ $invoice->tech_name }}
                       </td>
                       <td>
                           {{ $invoice->work_location }}
                       </td>
                       <td>
                           {{ $invoice->ticket_number }}
                       </td>
                       <td>
                           <a target="_blank" href="{{ asset($invoice->file) }}">Download</a>
                       </td>
                       <td>
                           <a href="{{ url('/edit/invoice/'.$invoice->id) }}"><button class="btn btn-info">Edit</button></a>
                           <a href="{{ url('/delete/invoice/'.$invoice->id) }}"><button class="btn btn-danger">Delete</button></a>
                       </td>
                   </tr>
               @endforeach
                </tbody>
                <tfoot>
               
                </tfoot>
            </table>
    </div>
@endsection

<style>
    .red {
        color: red;
    }
</style>

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endsection

