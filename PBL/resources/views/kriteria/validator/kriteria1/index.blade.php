@extends('layouts.temp_validator')

@section('content')
    <!-- Header -->
    <div class="header">
        <h3>Home / Kriteria 1 </h3>
        <h2>Kriteria 1</h2>
    </div>

    <!-- Spacer untuk Header Fixed -->
    <div style="height: 50px;"></div>

    <div class="main-content">
        <!-- PDF Preview Container -->
        <div class="pdf-preview-container">
            <h3>Pratinjau Laporan Data Kriteria 1</h3>

            <embed src="{{ route('kriteria.stream') }}" type="application/pdf" width="100%" height="500px">
        </div>

        <!-- Detail Revisi Section -->
        <div class="comments-section">
            <h3>Detail Revisi:</h3>
            <div class="detail-revisi-item">

            </div>
            <div class="detail-revisi-item status-section">
                <label>Status :</label>
                <input type="radio" id="diterma" name="status" value="diterma" checked>
                <label for="diterma"> Diterima</label>
                <input type="radio" id="ditolak" name="status" value="ditolak">
                <label for="ditolak"> Ditolak</label>
                <span>(Telah Diterima Oleh KJM)</span>
            </div>
            <div class="detail-revisi-item">
                <label>Komentar :</label>
                <div class="comment-form">
                    <textarea placeholder="Catatan untuk revisi..."></textarea>
                    <button onclick="addComment()">Kirim</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const textarea = document.querySelector('.comment-form textarea');
            const radioDiterma = document.getElementById('diterma');
            const radioDitolak = document.getElementById('ditolak');

            function toggleTextarea() {
                textarea.disabled = radioDiterma.checked;
            }

            toggleTextarea();

            radioDiterma.addEventListener('change', toggleTextarea);
            radioDitolak.addEventListener('change', toggleTextarea);

            window.addComment = function () {
                const komentar = textarea.value.trim();
                const status = radioDiterma.checked ? 'acc' : 'rev';

                fetch("{{ route('kriteria1.kirimKomentar') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ komentar, status })
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    if (status === 'rev' && komentar) {
                        const commentsSection = document.querySelector('.comments-section');
                        const newComment = document.createElement('div');
                        newComment.className = 'detail-revisi-item';
                        newComment.innerHTML = `<p><strong>KJM:</strong> ${komentar}</p>`;
                        commentsSection.insertBefore(newComment, document.querySelector('.comment-form').parentElement);
                        textarea.value = '';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Gagal mengirim komentar.');
                });
            };
        });
    </script>
@endsection