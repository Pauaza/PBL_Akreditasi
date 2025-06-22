<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Page Content</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @component('layouts.temp_modal', [
        'modalId' => 'viewPageModal',
        'modalTitle' => 'Detail Data Page',
        'cancelButtons' => [['text' => 'Kembali ke Daftar Page', 'class' => 'btn-primary', 'route' => route('superAdmin.page.index')]],
    ])
    <div class="mb-3">
        <label class="form-label">Page ID</label>
        <input type="text" class="form-control" value="{{ $page_id }}" readonly>
    </div>
    <div class="mb-3">
        <label class="form-label">Tab/Section</label>
        <input type="text" class="form-control" value="{{ ucfirst($tab) }}" readonly>
    </div>
    <div class="mb-3">
        <label class="form-label">Content</label>
        <textarea class="form-control" rows="6" readonly>{{ $content ?? '-' }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Image</label>
        @if($image_path)
            <img src="{{ asset('storage/' . $image_path) }}" alt="Page Image" class="preview-image">
        @else
            <p>-</p>
        @endif
    </div>
    @endcomponent
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .preview-image { max-width: 100%; max-height: 150px; border-radius: 10px; margin-top: 10px; }
    </style>
</body>
</html>