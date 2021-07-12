<?php

namespace App\Http\Controllers;

use App\Files;
use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class InvoiceController extends Controller
{
    //

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('form');
    }

    /**
     * @param $record
     * @return bool
     */
    public function writeToCsvFile($record)
    {
        $filePath = $record->file;
        $fileName = $record->file_name;
        $path = public_path($filePath);

        File::delete($path);

        $columns = array('Email', 'Activity Date', 'Tech Name', 'Work Location', 'Ticket Number', 'Activity Description', 'Travel Cost', 'Working Hours', 'Equipment Cost', 'Total payment', 'Invoice Date', 'Bank Name',
            'Bank City / Country','Account Title','IBAN','Account Number','BIC / Swift Code','Paypal Id',
        );
        $file = fopen($path, 'w');
        fputcsv($file, $columns);

        $invoices = Invoice::whereMonth('activity_date',date('m',strtotime($record->activity_date)))->whereYear('activity_date',date('Y',strtotime($record->activity_date)))->get();

        foreach ($invoices as $record)
        {
            $row = [
                $record->email,
                formatDate($record->activity_date),
                $record->tech_name,
                $record->work_location,
                $record->ticket_number,
                $record->activity_description,
                $record->travel_cost,
                $record->working_hours,
                $record->equipment_cost,
                $record->total_payment,
                formatDate($record->invoice_date),
                $record->bank_name,
                $record->bank_city,
                $record->account_title,
                $record->iban,
                $record->account_number,
                $record->swift_code,
                $record->paypal_id,
            ];
            fputcsv($file, $row);
        }

        $fileEntry = Files::where('name',$fileName)->first();
        if(!$fileEntry)
        {
            Files::create(
                [
                    'name' => $fileName,
                    'file' => $filePath
                ]
            );
        }

        fclose($file);
        return true;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $invoice = Invoice::create($request->except('_token'));

        $this->writeToCsvFile($invoice);

        return redirect('/')->with('success', 'Success. Data is saved successfully.');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $invoice = Invoice::find($id);

        return view('form')->with(['invoice' => $invoice, 'method' => 'edit']);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete($id)
    {
        $invoice = Invoice::find($id);
        Invoice::find($id)->delete();
        $this->writeToCsvFile($invoice);

        return redirect(url('admin'))->with('success', 'Success. Data is deleted successfully.');
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($id, Request $request)
    {
        $invoice = Invoice::find($id);
        $this->writeToCsvFile($invoice);
        $invoice->delete();

        $invoice = Invoice::create($request->except('_token'));
        $this->writeToCsvFile($invoice);

        return redirect(url('admin'))->with('success', 'Success. Data is saved successfully.');
    }
}

