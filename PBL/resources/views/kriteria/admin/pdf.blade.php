<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Finalisasi Kriteria Disetujui</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            line-height: 1.5;
            color: #333;
            margin: 40px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header img {
            max-height: 80px;
            margin-bottom: 10px;
        }
        .header h1 {
            font-size: 18pt;
            font-weight: bold;
            margin: 10px 0;
            color: #1a3c6d;
        }
        .header h2 {
            font-size: 14pt;
            font-weight: normal;
            margin: 5px 0;
            color: #333;
        }
        .header hr {
            border: 0;
            border-top: 2px solid #000;
            margin: 20px auto;
            width: 80%;
        }
        h3 {
            font-size: 14pt;
            font-weight: bold;
            margin: 20px 0 10px;
            color: #1a3c6d;
        }
        .meta {
            margin-bottom: 20px;
            font-size: 11pt;
        }
        .meta strong {
            font-weight: bold;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            font-size: 11pt;
        }
        th, td {
            border: 1px solid #000;
            padding: 10px;
            vertical-align: top;
            text-align: left;
        }
        th {
            background-color: #e6e6e6;
            font-weight: bold;
            color: #1a3c6d;
        }
        .section-title {
            background-color: #f2f2f2;
            font-weight: bold;
            font-size: 12pt;
            padding: 10px;
            text-align: center;
        }
        .footer {
            margin-top: 40px;
            text-align: right;
            font-size: 10pt;
            font-style: italic;
            color: #555;
        }
        .link {
            margin-top: 8px;
            font-size: 10pt;
        }
        .link a {
            color: #0645ad;
            text-decoration: none;
        }
        .link a:hover {
            text-decoration: underline;
        }
        .no-data {
            text-align: center;
            font-style: italic;
            color: #555;
            font-size: 11pt;
            margin: 20px 0;
        }
        .preview-image {
            max-width: 100%;
            max-height: 200px;
            margin-top: 10px;
            display: block;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('assets/img/logo-polinema.png') }}" alt="Logo Politeknik Negeri Malang">
        <h1>JURUSAN TEKNOLOGI INFORMASI</h1>
        <h2>POLITEKNIK NEGERI MALANG</h2>
        <hr>
    </div>

    <h1 style="text-align: center; font-size: 16pt; margin-bottom: 20px;">LAPORAN FINALISASI KRITERIA DISETUJUI</h1>
    <div class="meta">
        <strong>Tanggal Cetak:</strong> {{ \Carbon\Carbon::now()->format('d F Y') }}
    </div>

    @foreach ($kriteriaList as $kriteria)
        <h3>Kriteria {{ $kriteria->id_kriteria }}</h3>
        @if ($kriteria->details->isEmpty())
            <p class="no-data">Tidak ada detail yang disetujui untuk kriteria ini.</p>
        @else
            @foreach ($kriteria->details as $detail)
                <div class="meta">
                    <strong>ID Detail Kriteria:</strong> {{ $detail->id_detail_kriteria }}<br>
                    <strong>Status Validasi Dokumen:</strong>
                    @php
                        $statusValidasiList = [];
                        if ($detail->status_kjm === 'acc') {
                            $statusValidasiList[] = 'KJM: Disetujui';
                        } elseif ($detail->status_kjm === 'rev') {
                            $statusValidasiList[] = 'KJM: Ditolak';
                        }
                        if ($detail->status_direktur === 'acc') {
                            $statusValidasiList[] = 'Direktur: Disetujui';
                        } elseif ($detail->status_direktur === 'rev') {
                            $statusValidasiList[] = 'Direktur: Ditolak';
                        }
                        echo count($statusValidasiList) > 0 ? implode(' | ', $statusValidasiList) : 'Dalam Proses';
                    @endphp
                    <br>
                    <strong>Pengisi Dokumen:</strong> {{ $detail->user->name ?? 'Tidak Diketahui' }}
                </div>
                <table>
                    <tr class="section-title">
                        <th colspan="2">Penetapan</th>
                    </tr>
                    <tr>
                        <th width="80%">Isi Dokumen</th>
                        <th width="20%">Link Pendukung</th>
                    </tr>
                    <tr>
                        <td>{!! $detail->penetapan->penetapan ?? 'Tidak ada data' !!}</td>
                        <td>
                            @if (!empty($detail->penetapan->link))
                                <div class="link">
                                    <a href="{{ $detail->penetapan->link }}" target="_blank" rel="noopener">{{ $detail->penetapan->link }}</a>
                                </div>
                            @else
                                Tidak ada
                            @endif
                        </td>
                    </tr>
                    <tr class="section-title">
                        <th colspan="2">Pelaksanaan</th>
                    </tr>
                    <tr>
                        <td>{!! $detail->pelaksanaan->penetapan ?? 'Tidak ada data' !!}</td>
                        <td>
                            @if (!empty($detail->pelaksanaan->link))
                                <div class="link">
                                    <a href="{{ $detail->pelaksanaan->link }}" target="_blank" rel="noopener">{{ $detail->pelaksanaan->link }}</a>
                                </div>
                            @else
                                Tidak ada
                            @endif
                        </td>
                    </tr>
                    <tr class="section-title">
                        <th colspan="2">Evaluasi</th>
                    </tr>
                    <tr>
                        <td>{!! $detail->evaluasi->penetapan ?? 'Tidak ada data' !!}</td>
                        <td>
                            @if (!empty($detail->evaluasi->link))
                                <div class="link">
                                    <a href="{{ $detail->evaluasi->link }}" target="_blank" rel="noopener">{{ $detail->evaluasi->link }}</a>
                                </div>
                            @else
                                Tidak ada
                            @endif
                        </td>
                    </tr>
                    <tr class="section-title">
                        <th colspan="2">Pengendalian</th>
                    </tr>
                    <tr>
                        <td>{!! $detail->pengendalian->penetapan ?? 'Tidak ada data' !!}</td>
                        <td>
                            @if (!empty($detail->pengendalian->link))
                                <div class="link">
                                    <a href="{{ $detail->pengendalian->link }}" target="_blank" rel="noopener">{{ $detail->pengendalian->link }}</a>
                                </div>
                            @else
                                Tidak ada
                            @endif
                        </td>
                    </tr>
                    <tr class="section-title">
                        <th colspan="2">Peningkatan</th>
                    </tr>
                    <tr>
                        <td>
                            {!! $detail->peningkatan->penetapan ?? 'Tidak ada data' !!}
                        </td>
                        <td>
                            @if (!empty($detail->peningkatan->link))
                                <div class="link">
                                    <a href="{{ $detail->peningkatan->link }}" target="_blank" rel="noopener">{{ $detail->peningkatan->link }}</a>
                                </div>
                            @else
                                Tidak ada
                            @endif
                        </td>
                    </tr>
                </table>
            @endforeach
        @endif
    @endforeach

    @if ($kriteriaList->isEmpty())
        <p class="no-data">Tidak ada kriteria yang tersedia untuk dilaporkan.</p>
    @endif

    <div class="footer">
        <p><em>Dokumen ini dicetak secara otomatis oleh sistem pada tanggal {{ \Carbon\Carbon::now()->format('d F Y') }}.</em></p>
    </div>
</body>
</html>