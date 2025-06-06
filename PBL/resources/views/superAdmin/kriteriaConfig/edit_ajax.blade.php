<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kriteria</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('layouts.temp_modal', [
        'modalId' => 'editKriteriaModal',
        'modalTitle' => 'Edit Data Kriteria',
        'cancelButton' => ['text' => 'Kembali', 'class' => 'btn-danger'],
        'actionButton' => ['text' => 'Simpan', 'class' => 'btn-primary', 'id' => 'saveEditKriteria'],
        'slot' => '
            <form id="editKriteriaForm">
                <input type="hidden" id="editKriteriaId" value="1">
                <div class="mb-3">
                    <label class="form-label">Nama Kriteria</label>
                    <input type="text" id="editNamaKriteria" class="form-control" value="Kriteria 1">
                </div>
            </form>
        '
    ])

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simulate save button for preview
        document.getElementById('saveEditKriteria').addEventListener('click', function() {
            alert('Simulasi: Data kriteria berhasil disimpan!');
            bootstrap.Modal.getInstance(document.getElementById('editKriteriaModal')).hide();
        });

        // Function to open edit modal
        function showEditKriteria() {
            new bootstrap.Modal(document.getElementById('editKriteriaModal')).show();
        }

        // Auto-open modal for preview
        document.addEventListener('DOMContentLoaded', function() {
            showEditKriteria();
        });
    </script>
</body>
</html>