@extends('layouts.temp_validator')

@section('content')
    @php
        use Illuminate\Support\Arr;

        $user = Auth::user();
        $level = $user->id_level; // 2=KPS, 3=Kajur, 4=KJM, 5=Direktur

        // Cek status KPS dan Kajur pada semua item
        $adaRevKps = $details->contains(fn($item) => $item->status_kps === 'rev');
        $adaRevKajur = $details->contains(fn($item) => $item->status_kajur === 'rev');

        $semuaAccKps = $details->every(fn($item) => $item->status_kps === 'acc');
        $semuaAccKajur = $details->every(fn($item) => $item->status_kajur === 'acc');

        // Jika ada revisi (rev) di KPS atau Kajur, pesan muncul
        // Jika ada item yang belum acc (status selain acc) di KPS atau Kajur, pesan muncul
        // Jika KPS dan Kajur sudah semua acc, tampil form validasi

        $validasiBelumTersedia = $adaRevKps || $adaRevKajur || !$semuaAccKps || !$semuaAccKajur;

        // Logika tampil untuk masing-masing level
        // Untuk KPS dan Kajur (2,3) tampilkan selalu form validasi
        // Untuk KJM dan Direktur (4,5) tampilkan form validasi hanya jika validasi Belum Tersedia false (alias sudah acc)
        if (in_array($level, [2, 3])) {
            $bolehTampil = true;
        } elseif (in_array($level, [4, 5])) {
            $bolehTampil = !$validasiBelumTersedia;
        } else {
            // Level lain, tampilkan sesuai kebutuhan
            $bolehTampil = true;
        }
    @endphp

    {{-- Header --}}
    <div class="header">
        <h3>Home / Kriteria {{ $kriteria->id_kriteria }}</h3>
        <h2>Kriteria {{ $kriteria->id_kriteria }}</h2>
    </div>

    {{-- Pesan Error --}}
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div style="height: 50px;"></div>

    {{-- Konten utama --}}
    @if ($bolehTampil)
        <div class="main-content">
            {{-- PDF Preview --}}
            <div class="pdf-preview-container">
                <h3>Pratinjau Laporan Data Kriteria {{ $kriteria->id_kriteria }}</h3>
                <embed src="{{ route('kriteria.stream', ['id_kriteria' => $kriteria->id_kriteria]) }}" type="application/pdf"
                    width="100%" height="500px">
            </div>

            {{-- Form Validasi --}}
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
                    </div>

                    <div class="detail-revisi-item">
                        <label>Komentar:</label>
                        <textarea placeholder="Catatan untuk revisi..." name="komentar" id="komentar" disabled></textarea>
                    </div>

                    <div class="comment-form">
                        <br>
                        <button type="submit">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    @else
        <div class="alert alert-warning mt-4">
            <strong>Validasi belum tersedia.</strong> Menunggu persetujuan dari KPS atau Kajur.
        </div>
    @endif

    {{-- Script toggle komentar --}}
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