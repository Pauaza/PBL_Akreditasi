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
            <embed src="https://media.neliti.com/media/publications/249244-none-837c3dfb.pdf    " type="application/pdf" class="pdf-viewer">
            <div class="comments-section">
                <h3>Detail Revisi:</h3>
                <div class="detail-revisi-item">
                    <label>Deskripsi :</label>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
            document.addEventListener('DOMContentLoaded', function() {
                function addComment() {
                    const textarea = document.querySelector('.comment-form textarea');
                    const commentText = textarea.value.trim();
                    if (commentText) {
                        const commentsSection = document.querySelector('.comments-section');
                        const newComment = document.createElement('div');
                        newComment.className = 'detail-revisi-item';
                        newComment.innerHTML = `<p><strong>KJM:</strong> ${commentText}</p>`;
                        commentsSection.insertBefore(newComment, document.querySelector('.comment-form').parentElement);
                        textarea.value = '';
                    }
                }
            });
        </script>
@endsection
