<?php

namespace App\Exports;

use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Concerns\FromCollection;

class SuratPemExport
{
    protected $surat_pemberitahuan;

    
    public function __construct($surat_pemberitahuan)
    {
       
        $this->surat_pemberitahuan = $surat_pemberitahuan;
    }

    public function download_pdf()
    {
        $pdf = Pdf::loadView('surat.surat_pdf', [
            'surat_pemberitahuan' => $this->surat_pemberitahuan
        ]);
        // dd($pdf);

        return $pdf->download('surat_pemberitahuan_'.$this->surat_pemberitahuan->id.'.pdf');
    }
}
