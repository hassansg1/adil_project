@extends('layouts.app')

@section('content')
    <div class="container">
        @if(\Illuminate\Support\Facades\Session::has('success'))
            <div class="alert alert-success">
                {{\Illuminate\Support\Facades\Session::get('success')}}
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
        <form method="POST" action="{{url('/create/invoice')}}" accept-charset="UTF-8"
              id="editForm" class="form-horizontal" data-toggle="validator">
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
                                                <label for="email ">Email:</label><span class="red"> *</span>
                                            </td>
                                            <td>
                                                <input placeholder="Your Email" class="form-control" type="email" id="email" name="email"
                                                       value="" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="activity_date ">Activity Date:</label><span
                                                        class="red"> *</span>
                                            </td>
                                            <td>
                                                <input placeholder="Your Answer" class="form-control" type="date" id="activity_date"
                                                       name="activity_date"
                                                       value="" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="tech_name ">Tech Name:</label><span class="red"> *</span>
                                            </td>
                                            <td>
                                                <input placeholder="Your Answer" class="form-control" type="text" id="tech_name" name="tech_name"
                                                       value="" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="work_location ">Work Location (City): </label><span
                                                        class="red"> *</span>
                                            </td>
                                            <td>
                                                <input placeholder="Your Answer" class="form-control" type="text" id="work_location"
                                                       name="work_location"
                                                       value="" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="ticket_number ">Ticket No: </label><span
                                                        class="red"> *</span>
                                            </td>
                                            <td>
                                                <input placeholder="Your Answer" class="form-control" type="text" id="ticket_number"
                                                       name="ticket_number"
                                                       value="" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="activity_description ">Activity Description: </label><span
                                                        class="red"> *</span>
                                            </td>
                                            <td>
                                                <input placeholder="Your Answer" class="form-control" type="text" id="activity_description"
                                                       name="activity_description"
                                                       value="" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="travel_cost ">Travel Cost (Approaved) : </label><span
                                                        class="red"> *</span>
                                            </td>
                                            <td>
                                                <input placeholder="Your Answer" class="form-control" type="text" id="travel_cost"
                                                       name="travel_cost"
                                                       value="" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="working_hours ">Working Hours: </label><span
                                                        class="red"> *</span>
                                            </td>
                                            <td>
                                                <input placeholder="Your Answer" class="form-control" type="text" id="working_hours"
                                                       name="working_hours"
                                                       value="" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="equipment_cost ">Equipment cost/ Miscellaneous
                                                    : </label><span class="red"> *</span>
                                            </td>
                                            <td>
                                                <input placeholder="Your Answer" class="form-control" type="text" id="equipment_cost"
                                                       name="equipment_cost"
                                                       value="" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="total_payment ">Total Payment: </label><span
                                                        class="red"> *</span>
                                            </td>
                                            <td>
                                                <input placeholder="Your Answer" class="form-control" type="text" id="total_payment"
                                                       name="total_payment"
                                                       value="" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="invoice_date ">Invoice Date: </label><span
                                                        class="red"> *</span>
                                            </td>
                                            <td>
                                                <input placeholder="Your Answer" class="form-control" type="date" id="invoice_date"
                                                       name="invoice_date"
                                                       value="" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="bank_details ">Bank Account Details: <br>
                                                    (i). Please ensure you write correct IBAN account details.<br> (ii) If
                                                    possible please provide Wise Bank account details.<br>(iii) Please
                                                    provide complete Bank details.
                                                </label><span class="red"> *</span>
                                            </td>
                                            <td>
                                                <input placeholder="Your Answer" class="form-control" type="text" id="bank_details"
                                                       name="bank_details"
                                                       value="" required>
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
                <a class="btn btn-lg btn-success" role="button" href="javascript:void(0);"
                   onclick="window.history.back();"> Back </a>
                &nbsp;&nbsp;
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

