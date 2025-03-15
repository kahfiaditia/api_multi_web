<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pemberitahuan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        .header {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .content {
            text-align: justify;
            line-height: 1.6;
        }
        .invoice-total {
            text-align: right;
            margin-bottom: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table, .table th, .table td {
            border: 1px solid black;
        }
        .table th, .table td {
            padding: 8px;
            text-align: left;
        }
        .signature {
            margin-top: 50px;
            text-align: right;
        }

        .header-text h2, .header-text h3, .header-text h5 {
            margin-bottom: 5px;
            line-height: 1.2; /* Mengurangi tinggi baris */
        }
</style>
    </style>
</head>
<body>

    <div class="header">
        <table>
            <tr>
                <td width="120" style="vertical-align: top;">
                    <img src="{{ public_path('assets/images/lebak_banten.png') }}" alt="Logo" width="100" height="100">
                </td>
                <td style="padding-left: 10px; vertical-align: top;">
                    <h2 style="margin: 0 0 2px 0; line-height: 1;">PEMERINTAH KABUPATEK LEBAK</h2>
                    <h2 style="margin: 0 0 2px 0; line-height: 1;">DESA PASIRKECAPI</h2>
                    <h3 style="margin: 0 0 2px 0; line-height: 1;">KECAMATAN MAJA KABUPATEN LEBAK BANTEN</h3>
                    <h4 style="margin: 0 0 2px 0; line-height: 1;">Jalan Kampung Ciuber, Maja, Lebak Banten 42382</h4>
                    {{-- <h5 style="margin: 0 0 2px 0; line-height: 1;">Kodepos 52255</h5> --}}
                </td>
            </tr>
        </table>
    </div>
    <hr>

    <div class="content">
        <div class="invoice-total">
            <p><strong>Lebak,</strong> {{ \Carbon\Carbon::parse($surat_pemberitahuan->tanggal_surat)->translatedFormat('d F Y') }}</p>
        </div>
        @php
            $kode_singkat = substr($surat_pemberitahuan->nomor_surat, 0, 10);
        @endphp
        <div class="invoice-details">
            <p style="margin: 0 0 2px 0; line-height: 1;"><strong>Nomor:</strong></p>
            <p style="margin: 0 0 2px 0; line-height: 1;">{!! DNS1D::getBarcodeHTML($kode_singkat, 'C128', 2, 50) !!}</p>
            <p style="margin: 0 0 2px 0; line-height: 2;"> {{ $surat_pemberitahuan->nomor_surat }}</p>
        </div>
        <br>
        <table class="mt-5">
            {{-- <tr>
                <td colspan="12"></td>
                <th>Tanggal</th>
                <td>:</td>
                <td>{{ $surat_pemberitahuan->tanggal_surat }}</td>
            </tr> --}}
            {{-- <tr>
                <th style="text-align: left;">Nomor</th>
                <td>:</td>
            </tr>
            <tr>
                <th style="text-align: left;"><p> {!! DNS1D::getBarcodeHTML($surat_pemberitahuan->nomor_surat, 'C128', 2, 50) !!}</p>
                    <p>{{ $surat_pemberitahuan->nomor_surat }}</p>
                </th>
                <td>:</td>
            </tr> --}}
            <tr>
                <td style="text-align: left;">Perihal</td>
                <td>:</td>
                <td><strong>{{ $surat_pemberitahuan->perihal ?? '-' }}</strong></td>
            </tr>
            <tr>
                <td style="text-align: left;">Lampiran</td>
                <td>:</td>
                <td>{{ $surat_pemberitahuan->lampiran.' Berkas' }}</td>
            </tr>

            {{-- <p>Kepada Yth,</p>
            <p><strong>{{ $surat_pemberitahuan->untuk ?? 'Nama Penerima' }}</strong></p>
            <p>Di tempat</p> --}}
           
        </table>

        <p>Kepada Yth,</p>
        @if(str_contains($surat_pemberitahuan->untuk, '.'))
            @php
                $items = array_filter(array_map('trim', explode('.', $surat_pemberitahuan->untuk)));
            @endphp
            <ol>
                @foreach($items as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ol>
        @else
            <p><strong>{{ $surat_pemberitahuan->untuk }}</strong></p>
        @endif
        <p>Di tempat</p>

        <p>
             {!! $surat_pemberitahuan->isi_surat !!}.
           
        </p>
    </div>

    <div class="signature mt-5" style="margin: 0 0 2px 0; line-height: 2;">
        <p style="margin: 0 0 2px 0; line-height: 2;">Hormat kami,</p>
        <p style="margin: 0 0 2px 0; line-height: 1;">{{ $surat_pemberitahuan->jabatan_pengirim }},</p>
        <p><img src="{{ public_path('storage/' . $surat_pemberitahuan->barcode) }}" alt="QR" style="height: 120px; width: 120px"></p>
        <p style="margin: 0 0 2px 0; line-height: 2;"><strong>{{ $surat_pemberitahuan->nama_pengirim ?? 'Nama Pengirim' }}</strong></p>
        <p style="margin: 0 0 2px 0; line-height: 1;"><strong>NIP {{ $surat_pemberitahuan->nip_pengirim ?? 'Nama Pengirim' }}</strong></p>
    </div>

</body>
</html>
