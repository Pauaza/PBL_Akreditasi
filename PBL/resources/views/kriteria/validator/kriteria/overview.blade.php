<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Kriteria</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        h3 {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .meta {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            margin-bottom: 20px;
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
    @php
        $user = Auth::user();
        $level = $user->id_level;
    @endphp

    <h1>LAPORAN DATA KRITERIA {{ $kriteria->id_kriteria }}</h1>
    <h2>Nama Kriteria: {{ $kriteria->nama_kriteria }}</h2>

    <div class="meta">
        <strong>Tanggal Cetak:</strong> {{ \Carbon\Carbon::now()->format('d-m-Y') }}
    </div>

    @php
        // Hitung jumlah detail yang akan ditampilkan
        $detailsToShow = $details->filter(function ($detail) use ($level) {
            if ($level === 2 && strtolower($detail->status_kps ?? '') === 'acc') {
                return false;
            }
            if ($level === 3 && strtolower($detail->status_kajur ?? '') === 'acc') {
                return false;
            }
            if ($level === 4 && strtolower($detail->status_kjm ?? '') === 'acc') {
                return false;
            }
            if ($level === 5 && strtolower($detail->status_direktur ?? '') === 'acc') {
                return false;
            }
            return true;
        });
    @endphp

    @forelse ($detailsToShow as $detail)
        <h3>Detail Kriteria ID: {{ $detail->id_detail_kriteria }}</h3>
        <div class="meta">
            <strong>Status Validasi:</strong>
            @php
                $statusValidasiList = [];

                if ($detail->status_kps === 'acc') {
                    $statusValidasiList[] = 'KPS: ACC';
                } elseif ($detail->status_kps === 'rev') {
                    $statusValidasiList[] = 'KPS: Ditolak';
                }

                if ($detail->status_kajur === 'acc') {
                    $statusValidasiList[] = 'Kajur: ACC';
                } elseif ($detail->status_kajur === 'rev') {
                    $statusValidasiList[] = 'Kajur: Ditolak';
                }

                if ($detail->status_kjm === 'acc') {
                    $statusValidasiList[] = 'KJM: ACC';
                } elseif ($detail->status_kjm === 'rev') {
                    $statusValidasiList[] = 'KJM: Ditolak';
                }

                if ($detail->status_direktur === 'acc') {
                    $statusValidasiList[] = 'Direktur: ACC';
                } elseif ($detail->status_direktur === 'rev') {
                    $statusValidasiList[] = 'Direktur: Ditolak';
                }

                echo count($statusValidasiList) > 0 ? implode(' | ', $statusValidasiList) : 'On Progress';
            @endphp
            <br>

            <strong>Status Selesai:</strong> {{ ucfirst($detail->status_selesai) }}<br>
            <strong>Pengisi:</strong> {{ $detail->user->name ?? '-' }}<br>
        </div>

        <table>
            <tr class="section-title">
                <td colspan="2">Penetapan</td>
            </tr>
            <tr>
                <td colspan="2">
                    {!! $detail->penetapan->penetapan ?? '-' !!}
                    @if (!empty($detail->penetapan->link))
                        <div class="link">
                            <strong>Link Pendukung: </strong><a href="{{ $detail->penetapan->link }}" target="_blank"
                                rel="noopener">{{ $detail->penetapan->link }}</a>
                        </div>
                    @endif
                </td>
            </tr>

            <tr class="section-title">
                <td colspan="2">Pelaksanaan</td>
            </tr>
            <tr>
                <td colspan="2">
                    {!! $detail->pelaksanaan->penetapan ?? '-' !!}
                    @if (!empty($detail->pelaksanaan->link))
                        <div class="link">
                            <strong>Link Pendukung: </strong><a href="{{ $detail->pelaksanaan->link }}" target="_blank"
                                rel="noopener">{{ $detail->pelaksanaan->link }}</a>
                        </div>
                    @endif
                </td>
            </tr>

            <tr class="section-title">
                <td colspan="2">Evaluasi</td>
            </tr>
            <tr>
                <td colspan="2">
                    {!! $detail->evaluasi->penetapan ?? '-' !!}
                    @if (!empty($detail->evaluasi->link))
                        <div class="link">
                            <strong>Link Pendukung: </strong><a href="{{ $detail->evaluasi->link }}" target="_blank"
                                rel="noopener">{{ $detail->evaluasi->link }}</a>
                        </div>
                    @endif
                </td>
            </tr>

            <tr class="section-title">
                <td colspan="2">Pengendalian</td>
            </tr>
            <tr>
                <td colspan="2">
                    {!! $detail->pengendalian->penetapan ?? '-' !!}
                    @if (!empty($detail->pengendalian->link))
                        <div class="link">
                            <strong>Link Pendukung: </strong><a href="{{ $detail->pengendalian->link }}" target="_blank"
                                rel="noopener">{{ $detail->pengendalian->link }}</a>
                        </div>
                    @endif
                </td>
            </tr>

            <tr class="section-title">
                <td colspan="2">Peningkatan</td>
            </tr>
            <tr>
                <td colspan="2">
                    {!! $detail->peningkatan->penetapan ?? '-' !!}
                    @if (!empty($detail->peningkatan->link))
                        <div class="link">
                            <strong>Link Pendukung: </strong><a href="{{ $detail->peningkatan->link }}" target="_blank"
                                rel="noopener">{{ $detail->peningkatan->link }}</a>
                        </div>
                    @endif
                </td>
            </tr>

            @if ($detail->komentar)
                <tr class="section-title">
                    <td colspan="2">Komentar Validator</td>
                </tr>
                <tr>
                    <td colspan="2">
                        {{ $detail->komentar->komentar ?? '-' }}
                    </td>
                </tr>
            @endif
        </table>
    @empty
        <div style="margin: 50px 0; text-align:center;">
            <strong>Tidak ada data yang perlu divalidasi. Semua detail sudah ACC oleh level Anda.</strong>
        </div>
    @endforelse

    <div class="footer">
        <p><em>Dokumen dicetak secara otomatis oleh sistem pada tanggal
                {{ \Carbon\Carbon::now()->format('d-m-Y') }}.</em></p>
    </div>
</body>

</html>