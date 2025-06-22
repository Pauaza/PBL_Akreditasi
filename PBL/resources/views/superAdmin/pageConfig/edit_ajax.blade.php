<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page Content</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-label { font-weight: 500; color: #333; }
        .form-control, .form-control-file { border-radius: 5px; }
        .preview-image { max-width: 100%; max-height: 150px; border-radius: 10px; margin-top: 10px; }
        .checkbox-group { display: flex; flex-direction: column; gap: 10px; padding: 10px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9; max-height: 200px; overflow-y: auto; }
        .checkbox-item { display: flex; align-items: center; gap: 8px; }
        .checkbox-item input[type="checkbox"] { margin: 0; transform: scale(1.2); }
        .checkbox-item label { margin: 0; font-size: 14px; color: #333; }
    </style>
</head>
<body>
    @component('layouts.temp_modal', [
        'modalId' => 'editPageModal',
        'modalTitle' => 'Edit Data Page',
        'cancelButtons' => [['text' => 'Kembali ke Daftar Page', 'class' => 'btn-danger', 'route' => route('superAdmin.page.index')]],
        'actionButton' => ['text' => 'Simpan', 'class' => 'btn-primary', 'id' => 'savePageContent'],
    ])
        <form id="editPageForm" action="{{ route('superAdmin.page.update', ['id' => $page_id, 'tab' => $tab]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="page_id" value="{{ $page_id }}">
            <input type="hidden" name="tab" value="{{ $tab }}">
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" class="form-control" rows="6">{{ $content ?? '' }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control-file" accept="image/*">
                @if($image_path)
                    <img src="{{ asset('storage/' . $image_path) }}" alt="Current Image" class="preview-image">
                @endif
                <small class="form-text text-muted">*Kosongkan jika tidak mengubah gambar</small>
            </div>
        </form>
    @endcomponent>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#savePageContent').on('click', function(e) {
                e.preventDefault();
                var form = $('#editPageForm')[0];
                var formData = new FormData(form);
                $.ajax({
                    url: '{{ route('superAdmin.page.update', ['id' => $page_id, 'tab' => $tab]) }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        alert('Konten berhasil diperbarui!');
                        window.location.href = '{{ route('superAdmin.page.index') }}';
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan saat memperbarui konten.');
                    }
                });
            });
        });
    </script>
</body>
</html>