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
    @component('layouts.temp_modal', [
        'modalId' => 'editKriteriaModal',
        'modalTitle' => 'Edit Data Kriteria',
        'cancelButtons' => [['text' => 'Kembali ke Daftar Kriteria', 'class' => 'btn-primary', 'route' => route('superAdmin.kriteria.index')]],
        'actionButton' => ['text' => 'Simpan', 'class' => 'btn-primary', 'id' => 'saveEditKriteria'],
    ])
    <form id="editKriteriaForm" action="{{ route('superAdmin.kriteria.update', $kriteria->id_kriteria) }}"
        method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $kriteria->id }}">
        <div class="mb-3">
            <label class="form-label">Nama Kriteria</label>
            <input type="text" name="nama_kriteria" id="editNamaKriteria" class="form-control"
                value="{{ $kriteria->nama_kriteria }}">
        </div>
    </form>
    @endcomponent


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('saveEditKriteria').addEventListener('click', function () {
            document.getElementById('editKriteriaForm').submit(); // <-- submit form
        });

        function showEditKriteria() {
            new bootstrap.Modal(document.getElementById('editKriteriaModal')).show();
        }

        document.addEventListener('DOMContentLoaded', function () {
            showEditKriteria();
        });
    </script>

</body>

</html>