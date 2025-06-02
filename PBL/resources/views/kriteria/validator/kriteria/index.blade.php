@extends('layouts.temp_validator')

@section('content')
    <!-- Header -->
    <div class="header">
        <h3>Home / Kriteria 1 </h3>
        <h2>Kriteria 1</h2>
    </div>

    <!-- Tampilkan Pesan Error jika Ada -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <!-- Spacer untuk Header Fixed -->
    <div style="height: 50px;"></div>
    <!-- Tampilkan Pesan Error jika Ada -->
    @if (!empty($error))
        <div class="alert alert-warning">
            {{ $error }}
        </div>
    @else
        <div class="main-content">
            <!-- PDF Preview Container -->
            <div class="pdf-preview-container">
                <h3>Pratinjau Laporan Data Kriteria 1</h3>

                <embed src="{{ route('kriteria.stream', ['id_kriteria' => $kriteria->id_kriteria]) }}" type="application/pdf"
                    width="100%" height="500px">

            </div>

            <!-- Detail Revisi Section -->
            <div class="comments-section">
                <h3>Detail Revisi:</h3>
                <div class="detail-revisi-item">

                </div>
                <form action="{{ route('validator.kriteria') }}" method="POST">
                    @csrf

                    <input type="hidden" name="user" value="{{ Auth::user()->username }}">
                    <input type="hidden" name="id_kriteria" value="{{ $kriteria->id_kriteria }}">

                    <div class="detail-revisi-item status-section">
                        <label>Status :</label>
                        <input type="radio" id="acc" name="status_validator" value="acc" checked>
                        <label for="acc"> Diterima</label>
                        <input type="radio" id="rev" name="status_validator" value="rev">
                        <label for="rev"> Ditolak</label>
                        <span>(Telah Diterima Oleh KJM)</span>
                    </div>
                    <div class="detail-revisi-item">
                        <label>Komentar :</label>
                        <textarea placeholder="Catatan untuk revisi..." name="komentar" id="komentar" disabled></textarea>
                        <div class="comment-form">
                            <br>
                            <button type="submit">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
    <script>
        const accRadio = document.getElementById('acc');
        const revRadio = document.getElementById('rev');
        const komentar = document.getElementById('komentar');

        function toggleKomentar() {
            if (revRadio.checked) {
                komentar.disabled = false;
            } else {
                komentar.disabled = true;
                komentar.value = ''; // Kosongkan komentar saat diterima supaya tidak terkirim
            }
        }

        // Pasang event listener ke radio buttons
        accRadio.addEventListener('change', toggleKomentar);
        revRadio.addEventListener('change', toggleKomentar);

        // Jalankan sekali saat halaman load untuk inisialisasi
        toggleKomentar();
    </script>
@endsection