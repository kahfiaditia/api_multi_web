<?php

namespace App\Exports;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;

class InvoiceExport
{
    protected $invoice;
    protected $invoiceItems;

    public function __construct($invoice, $invoiceItems)
    {
        $this->invoice = $invoice;
        $this->invoiceItems = $invoiceItems;
    }

    public function download()
    {
        $pdf = Pdf::loadView('invoice.pdf', [
            'invoice' => $this->invoice,
            'invoiceItems' => $this->invoiceItems
        ]);

        return $pdf->download('invoice_'.$this->invoice->nomor_invoice.'.pdf');
        // return $pdf->setPaper('a4', 'portrait')->stream('invoice.pdf');
    }
}
