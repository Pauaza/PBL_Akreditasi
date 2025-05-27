<!DOCTYPE html>
<html>

<head>
    <title>Laporan Kriteria 2</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        .meta {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            vertical-align: top;
        }

        .section-title {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .footer {
            margin-top: 50px;
            text-align: right;
        }

        .link {
            margin-top: 5px;
            font-size: 13px;
        }

        .link a {
            color: #0645ad;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h2>Laporan Kriteria 2</h2>

    <div class="meta">
        <strong>Nama Kriteria:</strong> {{ $item->kriteria->nama_kriteria ?? '-' }}<br>
        <strong>Status Validasi:</strong>
        @if ($item->status_validator === 'acc')
            ACC
        @elseif ($item->status_validator === 'rev')
            Ditolak
        @else
            On Progress
        @endif
        <br>
        <strong>Status Selesai:</strong> {{ ucfirst($item->status_selesai) }}<br>
        <strong>Pengisi:</strong> {{ $item->user->name ?? '-' }}<br>
        <strong>Tanggal Cetak:</strong> {{ \Carbon\Carbon::now()->format('d-m-Y') }}
    </div>

    <table>
        <tr class="section-title">
            <td colspan="2">Penetapan</td>
        </tr>
        <tr>
            <td colspan="2">
                {!! $item->penetapan->penetapan ?? '-' !!}
                @if (!empty($item->penetapan->link))
                    <div class="link">
                        <strong>Link Pendukung: </strong><a href="{{ $item->penetapan->link }}" target="_blank"
                            rel="noopener">{{ $item->penetapan->link }}</a>
                    </div>
                @endif
            </td>
        </tr>

        <tr class="section-title">
            <td colspan="2">Pelaksanaan</td>
        </tr>
        <tr>
            <td colspan="2">
                {!! $item->pelaksanaan->penetapan ?? '-' !!}
                @if (!empty($item->pelaksanaan->link))
                    <div class="link">
                        <strong>Link Pendukung: </strong><a href="{{ $item->pelaksanaan->link }}" target="_blank"
                            rel="noopener">{{ $item->pelaksanaan->link }}</a>
                    </div>
                @endif
            </td>
        </tr>

        <tr class="section-title">
            <td colspan="2">Evaluasi</td>
        </tr>
        <tr>
            <td colspan="2">
                {!! $item->evaluasi->penetapan ?? '-' !!}
                @if (!empty($item->evaluasi->link))
                    <div class="link">
                        <strong>Link Pendukung: </strong><a href="{{ $item->evaluasi->link }}" target="_blank"
                            rel="noopener">{{ $item->evaluasi->link }}</a>
                    </div>
                @endif
            </td>
        </tr>

        <tr class="section-title">
            <td colspan="2">Pengendalian</td>
        </tr>
        <tr>
            <td colspan="2">
                {!! $item->pengendalian->penetapan ?? '-' !!}
                @if (!empty($item->pengendalian->link))
                    <div class="link">
                        <strong>Link Pendukung: </strong><a href="{{ $item->pengendalian->link }}" target="_blank"
                            rel="noopener">{{ $item->pengendalian->link }}</a>
                    </div>
                @endif
            </td>
        </tr>

        <tr class="section-title">
            <td colspan="2">Peningkatan</td>
        </tr>
        <tr>
            <td colspan="2">
                {!! $item->peningkatan->penetapan ?? '-' !!}
                @if (!empty($item->peningkatan->link))
                    <div class="link">
                        <strong>Link Pendukung: </strong><a href="{{ $item->peningkatan->link }}" target="_blank"
                            rel="noopener">{{ $item->peningkatan->link }}</a>
                    </div>
                @endif
            </td>
        </tr>

        @if ($item->komentar)
            <tr class="section-title">
                <td colspan="2">Komentar Validator</td>
            </tr>
            <tr>
                <td colspan="2">
                    {{ $item->komentar->komentar ?? '-' }}
                </td>
            </tr>
        @endif
    </table>

    <div class="footer">
        <p><em>Dokumen dicetak secara otomatis oleh sistem pada tanggal
                {{ \Carbon\Carbon::now()->format('d-m-Y') }}.</em></p>
    </div>
</body>

</html>