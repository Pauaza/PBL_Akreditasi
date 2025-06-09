<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail User</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @component('layouts.temp_modal', [
        'modalId' => 'detailUserModal',
        'modalTitle' => 'Detail Data User',
        'cancelButtons' => [['text' => 'Kembali ke Daftar User', 'class' => 'btn-primary', 'route' => route('superAdmin.user.index')]],
    ])
    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" id="detailUsername" class="form-control" value="{{ $user->username }}" readonly>
    </div>
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" id="detailNama" class="form-control" value="{{ $user->name }}" readonly>
    </div>
    <div class="mb-3">
        <label class="form-label">Role</label>
        <input type="text" id="detailRole" class="form-control" value="{{ ucfirst($user->level->level_nama ?? '-') }}"
            readonly>
    </div>
    @endcomponent

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showDetailUser() {
            new bootstrap.Modal(document.getElementById('detailUserModal')).show();
        }

        document.addEventListener('DOMContentLoaded', function () {
            showDetailUser();
        });
    </script>
</body>

</html>