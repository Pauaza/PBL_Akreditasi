<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @component('layouts.temp_modal', [
        'modalId' => 'editUserModal',
        'modalTitle' => 'Edit Data User',
        'cancelButtons' => [['text' => 'Kembali ke Daftar User', 'class' => 'btn-danger', 'route' => route('superAdmin.user.index')]],
        'actionButton' => ['text' => 'Simpan', 'class' => 'btn-primary', 'id' => 'saveEditUser'],
    ])
    <form id="editUserForm" action="{{ route('superAdmin.user.update', $user->id_user) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="{{ $user->id_user }}">

        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="{{ $user->username }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="id_level" class="form-control">
                @foreach ($levels as $level)
                    <option value="{{ $level['id_level'] }}" {{ $user->id_level == $level['id_level'] ? 'selected' : '' }}>
                        {{ ucfirst($level['level_nama']) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
            <small class="form-text text-muted">*Kosongkan jika tidak mengubah password</small>
        </div>
    </form>
    @endcomponent
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simulasi tombol Simpan untuk preview
        document.getElementById('saveEditUser').addEventListener('click', function () {
            document.getElementById('editUserForm').submit(); // ini akan mengirim form ke route update
        });

        // Fungsi untuk membuka modal edit
        function showEditUser() {
            new bootstrap.Modal(document.getElementById('editUserModal')).show();
        }

        // Auto-open modal untuk preview
        document.addEventListener('DOMContentLoaded', function () {
            showEditUser();
        });
    </script>
</body>

</html>