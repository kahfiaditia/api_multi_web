<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
           
        }
        .invoice {
            background-color: #fff;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 100px;
            height: auto;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .invoice-details p {
            margin: 0;
            line-height: 1.5;
        }
        .invoice-items {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .invoice-items th, .invoice-items td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .invoice-items th {
            background-color: #f4f4f4;
        }
        .invoice-total {
            text-align: right;
            margin-bottom: 20px;
        }
        .invoice-total p {
            margin: 0;
            line-height: 1.5;
        }
        .invoice-footer {
            text-align: left;
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
        .invoice-items {
            width: 100%;
            border-collapse: collapse; /* Pastikan tidak ada garis antar sel */
        }
        .invoice-items td {
            border: none; /* Hilangkan garis di dalam tabel */
            padding: 10px; /* Beri jarak agar tidak terlalu rapat */
        }
        .text-end {
            text-align: right;
        }
        .invoice-items td {
            vertical-align: top; /* Pindahkan elemen ke bagian atas */
            padding-top: 0; /* Kurangi jarak atas */
        }
        .header {
            display: flex;
            justify-content: space-between; /* Elemen kiri dan kanan sejajar */
            align-items: flex-start; /* Posisikan semua ke atas */
            margin-bottom: 20px;
        }

        .header-left .logo {
            width: 80px; /* Atur ukuran logo */
            height: auto;
        }

        .header-right {
            text-align: right; /* Buat teks sejajar ke kanan */
        }

        .header-right h1 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="header">
            <table class="invoice-items">
                <thead>
                    <tr>
                        <td> 
                            <img src="{{ public_path('assets/images/logo-sm.png') }}" alt="Logo" style="width: 50px;">
                        </td>
                        <td class="text-end">
                            <div class="invoice-total">
                                <p><strong>I N V O I C E</strong></p>
                            </div>
                        </td>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
        <div class="invoice-details">
            <table class="invoice-items">
                <thead>
                    <tr>
                        <td> 
                            <p><strong>Nomor Invoice:</strong></p>
                            <p> {!! DNS1D::getBarcodeHTML($invoice->nomor_invoice, 'C128', 2, 50) !!}</p>
                            <p>{{ $invoice->nomor_invoice }}</p>
                        </td>
                        <td class="text-end">
                            <div class="invoice-total">
                                <p><strong>Tanggal</strong>: {{ \Carbon\Carbon::parse($invoice->created_at)->format('d M Y') }}
                                </p>
                                <p><strong>Status</strong>: {{ $invoice->status == 1 ? "Telah dibayar" : "Belum Lunas" }}</p>
                            </div>
                        </td>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
        <div class="invoice-details">
            <p><strong>Untuk:</strong></p>
            <p>{{ $invoice->penerima->nama_penerima }}</p>
            <p>Divisi {{ $invoice->penerima->divisi_penerima }}</p>
            <p>{{ $invoice->penerima->alamat_penerima }}</p>
            <p>{{ $invoice->penerima->telepon_penerima }}</p>
        </div>
        <table class="invoice-items">
            <thead>
                <tr>
                    <th style="width: 40%; text-align: center;">Deskripsi</th>
                    <th style="width: 20%; text-align: center;">Harga</th>
                    <th style="width: 10%; text-align: center;">Kuantiti</th>
                    <th style="width: 30%; text-align: center;">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoiceItems as $detil)
                    <tr>
                        <td>{{ $detil->deskripsi }}</td>
                        <td>Rp {{ number_format($detil->harga, 0, ',', '.') }}</td>
                        <td>{{ $detil->kuantiti }}</td>
                        <td style="text-align: right;">Rp {{ number_format($detil->subtotal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td class="invoice-total" colspan="3" style="background-color: #f4f4f4; color: #000; font-weight: bold; text-align: right;">
                        Subtotal
                    </td>
                    <td colspan="3" style="background-color: #f4f4f4; color: #000; font-weight: bold; text-align: right"></strong> Rp {{ number_format($detil->total, 0, ',', '.') }}</p></td>
                    
                </tr>
                <tr>
                    <td class="invoice-total" colspan="3" style="background-color: #f4f4f4; color: #000; font-weight: bold; text-align: right;">
                        Pajak
                    </td>
                    <td colspan="3" style="background-color: #f4f4f4; color: #000; font-weight: bold; text-align: right"></strong> 0</p></td>
                    
                </tr>
                <tr>
                    <td class="invoice-total" colspan="3" style="background-color: #f4f4f4; color: #000; font-weight: bold; text-align: right; text-align: right">
                        Diskon
                    </td>
                    <td colspan="3" style="background-color: #f4f4f4; color: #000; font-weight: bold; text-align: right"></strong> 0</p></td>
                    
                </tr>
                <tr>
                    <td class="invoice-total" colspan="3" style="background-color: #f4f4f4; color: #000000; font-weight: bold; text-align: right;">
                        Total
                    </td>
                    <td colspan="3" style="background-color: #f4f4f4; color: #000; font-weight: bold; text-align: right"></strong> Rp {{ number_format($detil->total, 0, ',', '.') }}</p></td>
                    
                </tr>
            </tfoot>
        </table>
        {{-- <div class="invoice-total">
            <p><strong>SUB TOTAL:</strong> RP 800,000</p>
            <p><strong>PAJAK:</strong> RP 80,000</p>
            <p><strong>TOTAL:</strong> RP 880,000</p>
        </div> --}}
        <div class="invoice-details">
            <p><strong>PEMBAYARAN:</strong></p>
            <p>Bank : {{ $invoice->bank }} {{ $invoice->nomor_rekening }}</p>
            {{-- <p>Nomor Rekening : {{ $invoice->nomor_rekening }}</p> --}}
            <p> Atas Nama : {{ $invoice->atas_nama }}</p>
        </div>
        <div class="invoice-total">
            <p><strong>{{ $invoice->pengirim->nama_pengirim }}</strong></p>
            <p><img src="{{ public_path('storage/qr_pengirim/' . $invoice->pengirim->qr_code_pengirim) }}" alt="QR Pengirim" style="height: 120px; width: 120px"></p>

            <p><strong>{{ $invoice->pengirim->jabatan }}</strong></p>
        </div>
        <div class="invoice-footer">
            <p>Invoice ini dicetak dengan sistem komputerisasi oleh {{ $invoice->pengirim->nama_perusahaan }} dan tidak membutuhkan tanda tangan.</p>
        </div>
    </div>
</body>
</html>