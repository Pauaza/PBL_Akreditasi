@extends('layouts.temp_validator')

@section('content')
    @php
        $user = Auth::user();
        $level = $user->id_level;

        $sudahAccKajur = $details->contains(fn($item) => $item->status_kajur === 'acc');
        $sudahAccKps = $details->contains(fn($item) => $item->status_kps === 'acc');
        $sudahAccKjm = $details->contains(fn($item) => $item->status_kjm === 'acc');
        $sudahAccDirektur = $details->contains(fn($item) => $item->status_direktur === 'acc');

        $bolehTampilkan = match ($level) {
            2 => !$sudahAccKps,
            3 => !$sudahAccKajur,
            4 => !$sudahAccKjm,
            5 => !$sudahAccDirektur,
            default => false,
        };
    @endphp

    <!-- Header -->
    <div class="header">
        <h3>Home / Kriteria 1</h3>
        <h2>Kriteria 1</h2>
    </div>

    <!-- Tampilkan Pesan Error jika Ada -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div style="height: 50px;"></div>

    @if (!empty($error))
        <div class="alert alert-warning">{{ $error }}</div>
    @elseif ($bolehTampilkan)
        <div class="main-content">
            <div class="pdf-preview-container">
                <h3>Pratinjau Laporan Data Kriteria 1</h3>
                <embed src="{{ route('kriteria.stream', ['id_kriteria' => $kriteria->id_kriteria]) }}" type="application/pdf"
                    width="100%" height="500px">
            </div>

            <div class="comments-section">
                <h3>Detail Revisi:</h3>

                <form action="{{ route('validator.kriteria') }}" method="POST">
                    @csrf

                    <input type="hidden" name="user" value="{{ $user->username }}">
                    <input type="hidden" name="id_kriteria" value="{{ $kriteria->id_kriteria }}">

                    <div class="detail-revisi-item status-section">
                        <label>Status:</label>
                        <input type="radio" id="acc" name="status_validator" value="acc" checked>
                        <label for="acc">Diterima</label>
                        <input type="radio" id="rev" name="status_validator" value="rev">
                        <label for="rev">Ditolak</label>
                        <span>(Telah Diterima Oleh KJM)</span>
                    </div>

                    <div class="detail-revisi-item">
                        <label>Komentar:</label>
                        <textarea placeholder="Catatan untuk revisi..." name="komentar" id="komentar" disabled></textarea>
                        <div class="comment-form">
                            <br>
                            <button type="submit">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @else
        <div class="alert alert-info">
            @switch($level)
                @case(2)
                    @if ($sudahAccKps)
                        Data ini telah disetujui oleh KPS dan tidak memerlukan tindakan lebih lanjut dari Anda.
                    @else
                        Data belum tersedia untuk Anda. Silakan tunggu proses validasi sebelumnya.
                    @endif
                @break

                @case(3)
                    @if ($sudahAccKajur)
                        Data ini telah disetujui oleh Kajur dan tidak memerlukan tindakan lebih lanjut dari Anda.
                    @else
                        Data belum tersedia untuk Anda. Silakan tunggu proses validasi sebelumnya.
                    @endif
                @break

                @case(4)
                    @if ($sudahAccKjm)
                        Data ini telah disetujui oleh KJM dan tidak memerlukan tindakan lebih lanjut dari Anda.
                    @else
                        Data belum tersedia untuk Anda. Silakan tunggu proses validasi sebelumnya.
                    @endif
                @break

                @case(5)
                    @if ($sudahAccDirektur)
                        Data ini telah disetujui oleh Direktur dan tidak memerlukan tindakan lebih lanjut dari Anda.
                    @else
                        Data belum tersedia untuk Anda. Silakan tunggu proses validasi sebelumnya.
                    @endif
                @break

                @default
                    Data belum tersedia atau Anda tidak memiliki hak akses untuk memverifikasi data ini.
            @endswitch
        </div>
    @endif

    <script>
        const accRadio = document.getElementById('acc');
        const revRadio = document.getElementById('rev');
        const komentar = document.getElementById('komentar');

        function toggleKomentar() {
            komentar.disabled = !revRadio.checked;
            if (!revRadio.checked) {
                komentar.value = '';
            }
        }

        accRadio?.addEventListener('change', toggleKomentar);
        revRadio?.addEventListener('change', toggleKomentar);
        toggleKomentar();
    </script>
@endsection