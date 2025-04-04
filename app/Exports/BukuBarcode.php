<?php

namespace App\Exports;

use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Concerns\FromCollection;

class BukuBarcode
{
    protected $buku;

    public function __construct($buku)
    {
        $this->buku = $buku;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
 
    public function download()
    {
        $pdf = Pdf::loadView('buku.view', [
            'buku' => $this->buku,
        ]);

        return $pdf->download('buku_barcode_'.$this->buku->kode.'.pdf');
        // return $pdf->setPaper('a4', 'portrait')->stream('invoice.pdf');
    }


    
}
