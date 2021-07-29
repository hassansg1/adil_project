@extends('layouts.layout')

@section('content')
    <div class="container">
        @if(\Illuminate\Support\Facades\Session::has('success'))
            <div class="alert alert-success">
                {{\Illuminate\Support\Facades\Session::get('success')}}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>HWiTS Invoice<br></h1>
        <h5>
            1. Please fill the form completely.<br>
            2. Each FIeld is Mandatory.<br>
            3. Please fill separate invoice for separate activities.<br>
            <br>
            <span class="red">* Required</span><br>
        </h5>
        <br>
        <br>
        @if(isset($method) && $method == "edit")
            <form method="POST" action="{{url('/update/invoice/'.$invoice->id)}}" accept-charset="UTF-8"
                  id="editForm" class="form-horizontal" data-toggle="validator">
                @else
                    <form method="POST" action="{{url('/create/invoice')}}" accept-charset="UTF-8"
                          id="editForm" class="form-horizontal" data-toggle="validator">
                        @endif

                        {{ csrf_field() }}

                        <div class="tab-content">
                            <div id="basic-settings" class="tab-pane active">
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-0">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <table class="table">
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <label for="email ">Email:</label><span
                                                                    class="red"> *</span>
                                                        </td>
                                                        <td>
                                                            <input placeholder="Your Email" class="form-control"
                                                                   type="email" id="email" name="email"
                                                                   value="{{ $invoice->email ?? '' }}" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="activity_date ">Activity Date:</label><span
                                                                    class="red"> *</span>
                                                        </td>
                                                        <td>
                                                            <input placeholder="Your Answer" class="form-control"
                                                                   type="date" id="activity_date"
                                                                   name="activity_date"
                                                                   value="{{ isset($invoice) ? date('Y-m-d',strtotime($invoice->activity_date)) : '' }}"
                                                                   required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="tech_name ">Tech Name:</label><span class="red"> *</span>
                                                        </td>
                                                        <td>
                                                            <input placeholder="Your Answer" class="form-control"
                                                                   type="text" id="tech_name" name="tech_name"
                                                                   value="{{ $invoice->tech_name ?? '' }}" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="work_location ">Work Location
                                                                (City): </label><span
                                                                    class="red"> *</span>
                                                        </td>
                                                        <td>
                                                            <input placeholder="Your Answer" class="form-control"
                                                                   type="text" id="work_location"
                                                                   name="work_location"
                                                                   value="{{ $invoice->work_location ?? '' }}" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="ticket_number ">Ticket No: </label><span
                                                                    class="red"> *</span>
                                                        </td>
                                                        <td>
                                                            <input placeholder="Your Answer" class="form-control"
                                                                   type="text" id="ticket_number"
                                                                   name="ticket_number"
                                                                   value="{{ $invoice->ticket_number ?? '' }}" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="activity_description ">Activity
                                                                Description: </label><span
                                                                    class="red"> *</span>
                                                        </td>
                                                        <td>
                                                            <input placeholder="Your Answer" class="form-control"
                                                                   type="text" id="activity_description"
                                                                   name="activity_description"
                                                                   value="{{ $invoice->activity_description ?? '' }}"
                                                                   required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="travel_cost ">Travel Cost (Approaved) : </label><span
                                                                    class="red"> *</span>
                                                        </td>
                                                        <td>
                                                            <input placeholder="Your Answer" class="form-control"
                                                                   type="text" id="travel_cost"
                                                                   name="travel_cost"
                                                                   value="{{ $invoice->travel_cost ?? '' }}" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="working_hours ">Working Hours: </label><span
                                                                    class="red"> *</span>
                                                        </td>
                                                        <td>
                                                            <input placeholder="Your Answer" class="form-control"
                                                                   type="text" id="working_hours"
                                                                   name="working_hours"
                                                                   value="{{ $invoice->working_hours ?? '' }}" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="equipment_cost ">Equipment cost/ Miscellaneous
                                                                : </label><span class="red"> *</span>
                                                        </td>
                                                        <td>
                                                            <input placeholder="Your Answer" class="form-control"
                                                                   type="text" id="equipment_cost"
                                                                   name="equipment_cost"
                                                                   value="{{ $invoice->equipment_cost ?? '' }}"
                                                                   required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="total_payment ">Total Payment: </label><span
                                                                    class="red"> *</span>
                                                        </td>
                                                        <td>
                                                            <input placeholder="Your Answer" class="form-control"
                                                                   type="text" id="total_payment"
                                                                   name="total_payment"
                                                                   value="{{ $invoice->total_payment ?? '' }}" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="invoice_date ">Invoice Date: </label><span
                                                                    class="red"> *</span>
                                                            <br>
                                                            Please ensure that our payment terms are 30 working days
                                                            <br>after the invoice date
                                                        </td>
                                                        <td>
                                                            <input placeholder="Your Answer" class="form-control"
                                                                   type="date" id="invoice_date"
                                                                   name="invoice_date"
                                                                   value="{{ isset($invoice) ? date('Y-m-d',strtotime($invoice->invoice_date)) : '' }}"
                                                                   required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="bank_details ">Bank Account Details: <br>
                                                                (i). Please ensure you write correct IBAN account
                                                                details.<br> (ii) If
                                                                possible please provide Wise Bank account details.<br>(iii)
                                                                Please
                                                                provide complete Bank details.<br>(iii)
                                                                Write N/A if not valid
                                                            </label>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="invoice_date ">Bank Name: </label><span
                                                                    class="red"> *</span>
                                                        </td>
                                                        <td>
                                                            <input placeholder="Bank Name" class="form-control"
                                                                   type="text" id="bank_name"
                                                                   name="bank_name"
                                                                   value="  {{ $invoice->bank_name ?? '' }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="invoice_date ">Bank City /
                                                                Country: </label><span
                                                                    class="red"> *</span>
                                                        </td>
                                                        <td>
                                                            <input placeholder="City / Country" class="form-control"
                                                                   type="text" id="bank_city"
                                                                   name="bank_city"
                                                                   value=" {{ $invoice->bank_city ?? '' }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="invoice_date ">Account Title: </label><span
                                                                    class="red"> *</span>
                                                        </td>
                                                        <td>
                                                            <input placeholder="Account Title" class="form-control"
                                                                   type="text" id="account_title"
                                                                   name="account_title"
                                                                   value=" {{ $invoice->account_title ?? '' }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="invoice_date ">IBAN: </label><span
                                                                    class="red"> *</span>
                                                        </td>
                                                        <td>
                                                            <input placeholder="IBAN" class="form-control" type="text"
                                                                   id="iban"
                                                                   name="iban"
                                                                   value=" {{ $invoice->iban ?? '' }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="invoice_date ">Account Number: </label><span
                                                                    class="red"> *</span>
                                                        </td>
                                                        <td>
                                                            <input placeholder="Account Number:" class="form-control"
                                                                   type="text" id="account_number"
                                                                   name="account_number"
                                                                   value=" {{ $invoice->account_number ?? '' }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="invoice_date ">BIC / Swift Code: </label><span
                                                                    class="red"> *</span>
                                                        </td>
                                                        <td>
                                                            <input placeholder="BIC / Swift Code" class="form-control"
                                                                   type="text" id="swift_code"
                                                                   name="swift_code"
                                                                   value="{{ $invoice->swift_code ?? '' }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="invoice_date ">Paypal Id: </label><span
                                                                    class="red"> *</span>
                                                        </td>
                                                        <td>
                                                            <input placeholder="Paypal Id" class="form-control"
                                                                   type="text" id="paypal_id"
                                                                   name="paypal_id"
                                                                   value="{{ $invoice->paypal_id ?? '' }}">
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 30px ; float: right">
                            <input class="btn btn-lg btn-success" type="submit" value="Submit">
                        </div>
                    </form>
    </div>
@endsection

<style>
    .red {
        color: red;
    }
</style>

