<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kriteria</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @component('layouts.temp_modal', [
        'modalId' => 'detailKriteriaModal',
        'modalTitle' => 'Detail Data Kriteria',
        'cancelButton' => ['text' => 'Kembali', 'class' => 'btn-primary'],
    ])
    <div class="mb-3">
        <label class="form-label">Nama Kriteria</label>
        <input type="text" id="detailNamaKriteria" class="form-control" value="{{ $kriteria->nama_kriteria }}" readonly>
    </div>
    @endcomponent


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to open detail modal
        function showDetailKriteria() {
            new bootstrap.Modal(document.getElementById('detailKriteriaModal')).show();
        }

        // Auto-open modal for preview
        document.addEventListener('DOMContentLoaded', function () {
            showDetailKriteria();
        });
    </script>
</body>

</html>