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
            $tampilPdf = !$semuaAccKps;
        } elseif ($level === 3) {
            $tampilPdf = !$semuaAccKajur;
        } elseif (in_array($level, [4, 5])) {
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

        // Cek apakah form sudah disubmit
        $formSubmitted = session()->has('status_validator');
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

        {{-- Form Validasi hanya untuk yang boleh dan belum disubmit --}}
        @if ($bolehTampilForm && !$formSubmitted)
            <div class="comments-section">
                <h3>Detail Revisi :</h3>

                <!-- Alert Penting -->
                <div class="important-alert">
                    <img src="{{ asset('assets/icon/warning.png') }}" alt="Peringatan" class="alert-icon">
                    <span>Validasi ini wajib diisi! Proses ini sangat penting untuk kelanjutan evaluasi.</span>
                </div>

                <!-- Form Validasi -->
                <form action="{{ route('validator.kriteria') }}" method="POST" id="validation-form">
                    @csrf
                    <input type="hidden" name="user" value="{{ $user->username }}">
                    <input type="hidden" name="id_kriteria" value="{{ $kriteria->id_kriteria }}">

                    <div class="detail-revisi-item">
                        <label for="status">Status:</label>
                        <div class="radio-buttons">
                            <input type="radio" id="acc" name="status_validator" value="acc" checked>
                            <label for="acc" class="radio-label radio-acc">Diterima</label>
                            <input type="radio" id="rev" name="status_validator" value="rev">
                            <label for="rev" class="radio-label radio-rev">Ditolak</label>
                        </div>
                    </div>

                    <div class="detail-revisi-item">
                        <label for="komentar">Komentar:</label>
                        <textarea placeholder="Catatan untuk revisi..." name="komentar" id="komentar" class="form-control" disabled></textarea>
                    </div>

                    <div class="comment-form">
                        <button type="submit" class="btn-submit">Kirim</button>
                    </div>
                </form>
            </div>
        @elseif (in_array($level, [4, 5]) && $semuaKosongAtauRev)
            <div class="alert alert-warning mt-4">
                <strong>Validasi belum tersedia.</strong> Menunggu persetujuan dari KPS atau Kajur.
            </div>
        @endif
    </div>

    <style>
        .main-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .pdf-preview-container {
            margin-bottom: 20px;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
        }

        .pdf-preview-container h3 {
            color: #1e293b;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .comments-section {
            padding: 20px;
            background: #f9f9f9;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
        }

        .comments-section h3 {
            color: #1e293b;
            font-size: 18px;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .detail-revisi-item {
            margin-bottom: 15px;
        }

        .detail-revisi-item label {
            display: block;
            font-weight: 500;
            color: #fff;
            margin-bottom: 5px;
        }

        .radio-buttons {
            display: flex;
            gap: 10px;
        }

        .radio-label {
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 14px;
            color: #fff;
            text-align: center;
            min-width: 100px;
            border: none;
        }

        .radio-acc {
            background-color: #315287;
        }

        .radio-acc:hover {
            background-color: #263f6a;
        }

        .radio-rev {
            background-color: #993a36;
        }

        .radio-rev:hover {
            background-color: #7a2d2a;
        }

        input[type="radio"] {
            display: none;
        }

        input[type="radio"]:checked + .radio-label {
            box-shadow: 0 0 0 2px #fff, 0 0 0 4px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            resize: vertical;
        }

        .comment-form {
            margin-top: 15px;
        }

        .btn-submit {
            background-color: #2e7d32;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #1b5e20;
        }

        .alert {
            padding: 15px;
            border-radius: 6px;
            margin-top: 20px;
        }

        .alert-warning {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
        }

        .important-alert {
            background-color: #fff3cd;
            color: #856404;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            border: 1px solid #ffeeba;
        }

        .alert-icon {
            width: 20px;
            height: 20px;
            object-fit: contain;
        }

        .custom-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 30px;
            color: #fff;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
            font-weight: 500;
        }

        .custom-alert img {
            width: 24px;
            height: 24px;
            object-fit: contain;
        }
    </style>

    <script>
        // Toggle komentar textarea based on radio selection
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

        // Handle form submission with AJAX
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('#validation-form');
            const submitUrl = '{{ route('validator.kriteria') }}';

            if (form) {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    // Validasi klien
                    const komentarInput = form.querySelector('#komentar');
                    const status = form.querySelector('input[name="status_validator"]:checked').value;
                    if (status === 'rev' && !komentarInput.value.trim()) {
                        showAlert(
                            'Komentar wajib diisi jika status Ditolak!',
                            '{{ asset('assets/icon/cross.png') }}',
                            '#993a36'
                        );
                        komentarInput.classList.add('is-invalid');
                        return;
                    } else {
                        komentarInput.classList.remove('is-invalid');
                    }

                    const formData = new FormData(form);
                    const csrfToken = form.querySelector('input[name="_token"]').value;

                    fetch(submitUrl, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(response => {
                        if (response.status === 302 || response.redirected) {
                            return response.text().then(() => {
                                fetch(window.location.href, { method: 'GET' })
                                    .then(res => res.text())
                                    .then(html => {
                                        if (html.includes('Data berhasil disimpan')) {
                                            showAlert(
                                                'Data Berhasil Disimpan',
                                                '{{ asset('assets/icon/checkmark.png') }}',
                                                '#2e7d32'
                                            );
                                            form.style.display = 'none'; // Sembunyikan form setelah submit
                                        } else {
                                            throw new Error('Pesan sukses tidak ditemukan');
                                        }
                                    });
                            });
                        }
                        if (!response.ok) {
                            return response.json().then(err => {
                                throw new Error(JSON.stringify(err));
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.status) {
                            showAlert(
                                'Data Berhasil Disimpan',
                                '{{ asset('assets/icon/checkmark.png') }}',
                                '#2e7d32'
                            );
                            form.style.display = 'none'; // Sembunyikan form setelah submit
                        } else {
                            let errorMessage = data.message || 'Gagal menyimpan data';
                            if (data.errors) {
                                errorMessage += ': ' + Object.values(data.errors).flat().join(', ');
                            }
                            showAlert(
                                errorMessage,
                                '{{ asset('assets/icon/cross.png') }}',
                                '#993a36'
                            );
                        }
                    })
                    .catch(error => {
                        console.error('Kesalahan AJAX:', error);
                        showAlert(
                            'Gagal menyimpan data',
                            '{{ asset('assets/icon/cross.png') }}',
                            '#993a36'
                        );
                    });
                });
            }

            // Fungsi untuk menampilkan alert
            function showAlert(message, iconSrc, backgroundColor) {
                const existingAlert = document.querySelector('.custom-alert');
                if (existingAlert) existingAlert.remove();

                const alertDiv = document.createElement('div');
                alertDiv.className = 'custom-alert';
                alertDiv.style.backgroundColor = backgroundColor;

                const icon = document.createElement('img');
                icon.src = iconSrc;
                icon.onerror = () => console.error('Gagal memuat ikon:', iconSrc);

                const messageSpan = document.createElement('span');
                messageSpan.textContent = message;

                alertDiv.appendChild(icon);
                alertDiv.appendChild(messageSpan);
                document.body.appendChild(alertDiv);

                setTimeout(() => {
                    alertDiv.remove();
                }, 3000);
            }
        });
    </script>
@endsection