@extends('layouts.temp_validator')

@section('content')
    @php
        $user = Auth::user();
        $level = $user->id_level;

        $semuaAccKps = $details->every(fn($item) => strtolower($item->status_kps ?? '') === 'acc');
        $semuaAccKajur = $details->every(fn($item) => strtolower($item->status_kajur ?? '') === 'acc');
        $semuaAccKjm = $details->every(fn($item) => strtolower($item->status_kjm ?? '') === 'acc');
        $semuaAccDirektur = $details->every(fn($item) => strtolower($item->status_direktur ?? '') === 'acc');

        $adaRevKps = $details->contains(fn($item) => strtolower($item->status_kps ?? '') === 'rev');
        $adaRevKajur = $details->contains(fn($item) => strtolower($item->status_kajur ?? '') === 'rev');

        $adaAccKps = $details->contains(fn($item) => strtolower($item->status_kps ?? '') === 'acc');
        $adaAccKajur = $details->contains(fn($item) => strtolower($item->status_kajur ?? '') === 'acc');

        $semuaKosongAtauRev = !$adaAccKps && !$adaAccKajur;

        // Logika tampilkan PDF overview
        $tampilPdf = false;
        if ($level === 2) {
            // KPS: PDF hilang jika semua status_kps sudah acc
            $tampilPdf = !$semuaAccKps;
        } elseif ($level === 3) {
            // Kajur: PDF hilang jika semua status_kajur sudah acc
            $tampilPdf = !$semuaAccKajur;
        } elseif (in_array($level, [4, 5])) {
            // KJM/Direktur: PDF muncul hanya jika semua KPS & Kajur acc, dan KJM & Direktur belum ada acc
            $tampilPdf = $semuaAccKps && $semuaAccKajur && !$semuaAccKjm && !$semuaAccDirektur;
        }

        // Logika tampilkan form validasi
        $bolehTampilForm = false;
        if ($level === 2) {
            $bolehTampilForm = $details->contains(
                fn($item) => in_array(strtolower($item->status_kps ?? ''), ['', 'rev']),
            );
        } elseif ($level === 3) {
            $bolehTampilForm = $details->contains(
                fn($item) => in_array(strtolower($item->status_kajur ?? ''), ['', 'rev']),
            );
        } elseif (in_array($level, [4, 5])) {
            $bolehTampilForm = $semuaAccKps && $semuaAccKajur && !$adaRevKps && !$adaRevKajur;
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

    <div class="main-content">
        {{-- PDF Preview hanya muncul sesuai logika --}}
        @if ($tampilPdf)
            <div class="pdf-preview-container">
                <h3>Pratinjau Laporan Data Kriteria {{ $kriteria->id_kriteria }}</h3>
                <embed src="{{ route('kriteria.stream', ['id_kriteria' => $kriteria->id_kriteria]) }}" type="application/pdf"
                    width="100%" height="500px">
            </div>
        @endif

        {{-- Form Validasi hanya untuk yang boleh --}}
        @if ($bolehTampilForm)
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
        @elseif (in_array($level, [4, 5]) && $semuaKosongAtauRev)
            {{-- Pesan hanya untuk KJM & Direktur dan jika tidak ada satu pun acc --}}
            <div class="alert alert-warning mt-4">
                <strong>Validasi belum tersedia.</strong> Menunggu persetujuan dari KPS atau Kajur.
            </div>
        @endif
    </div>

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