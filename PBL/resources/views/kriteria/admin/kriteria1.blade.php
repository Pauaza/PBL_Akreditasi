@extends('layouts.temp_admin')

@section('content')
    <!-- Header -->
    <div class="header">
        <h3>Home / Kriteria 1 </h3>
        <h2>Kriteria 1</h2>
    </div>

    <!-- Spacer untuk Header Fixed -->
    <div style="height: 50px;"></div>

    @php
        $sections = ['Penetapan', 'Pelaksanaan', 'Evaluasi', 'Pengendalian', 'Peningkatan'];
    @endphp

    <form method="POST" action="{{ route('kriteria.submit') }}" enctype="multipart/form-data">
        @csrf

        @foreach ($sections as $index => $section)
            <div class="card">
                <div class="card-header">
                    <h5>{{ $section }}</h5>
                </div>
                <div class="card-body">
                    <div style="display: flex; align-items: center; gap: 20px;">
                        <div class="form-container">
                            <div class="form-group">
                                <label for="description{{ $index + 1 }}">Description:</label>
                                <textarea name="description{{ $index + 1 }}" id="description{{ $index + 1 }}"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="link{{ $index + 1 }}">Link Document:</label>
                                <textarea name="link{{ $index + 1 }}" id="link{{ $index + 1 }}"></textarea>
                            </div>
                        </div>
                        <div class="upload-photo">
                            <span class="upload-text">+ Upload</span>
                            <input type="file" name="pendukung{{ $index + 1 }}" class="file-input" style="display: none;"
                                accept="image/*">
                            <img src="" alt="Preview" class="preview-image" />
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Tombol Submit/Save/Edit -->
        <div class="button-group" style="margin-top: 20px;">
            <button type="submit" name="action" value="submit" class="btn-blue">Submit</button>
            <button type="submit" name="action" value="save" class="btn-green">Save</button>
            <button type="submit" name="action" value="edit" class="btn-yellow">Edit</button>
        </div>
    </form>


    <!-- Comments Section -->
    <div class="card">
        <div class="card-header">
            <h4>Comments:</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="comment">Direktur:</label>
                <textarea name="comment" id="comment" readonly>
                                Pada Bab penetapan ada yang salah di point ke-1 yaitu dokumen tidak ada tangan dari Ketua Jurusan
                            </textarea>
            </div>
        </div>
    </div>

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

    <script>
        window.onload = function () {
            const descriptionConfig = {
                toolbar: [
                    { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
                    { name: 'paragraph', items: ['NumberedList', 'BulletedList'] },
                    { name: 'styles', items: ['Format'] }
                ]
            };

            const linkConfig = {
                toolbar: [
                    { name: 'links', items: ['Link', 'Unlink'] },
                    { name: 'basicstyles', items: ['Bold', 'Italic'] }
                ]
            };

            for (let i = 1; i <= 5; i++) {
                if (document.getElementById('description' + i)) {
                    CKEDITOR.replace('description' + i, descriptionConfig);
                }
                if (document.getElementById('link' + i)) {
                    CKEDITOR.replace('link' + i, linkConfig);
                }
            }
        };
    </script>

    <!-- Upload Button Handler with Preview -->
    <script>
        document.querySelectorAll('.upload-photo').forEach((container) => {
            const fileInput = container.querySelector('.file-input');
            const previewImage = container.querySelector('.preview-image');
            const uploadText = container.querySelector('.upload-text');

            container.addEventListener('click', () => {
                if (fileInput) fileInput.click();
            });

            fileInput.addEventListener('change', function (event) {
                if (event.target.files.length > 0) {
                    const file = event.target.files[0];
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        previewImage.src = e.target.result;
                        previewImage.style.display = 'block'; // Show preview image
                        uploadText.style.display = 'none'; // Hide the upload text when image is selected
                    };

                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection