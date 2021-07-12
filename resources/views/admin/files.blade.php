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
                    <th>File Name</th>
                    <th>Download</th>
                </tr>
                </thead>
                <tbody>
               @foreach($files as $file)
                   <tr>
                       <td>
                           {{ $loop->iteration }}
                       </td>
                       <td>
                           {{ $file->name }}
                       </td>
                       <td>
                           <a target="_blank" href="{{ asset($file->file) }}">Download</a>
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

