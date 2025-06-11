<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @component('layouts.temp_modal', [
        'modalId' => 'createUserModal',
        'modalTitle' => 'Tambah User Baru',
        'cancelButtons' => [['text' => 'Kembali ke Daftar User', 'class' => 'btn-danger', 'route' => route('superAdmin.user.index')]],
        'actionButton' => ['text' => 'Simpan', 'class' => 'btn-primary', 'id' => 'saveCreateUser'],
    ])
    <form id="createUserForm" action="{{ route('superAdmin.user.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="id_level" class="form-control" required>
                <option value="">-- Pilih Level --</option>
                @foreach ($levels as $level)
                    <option value="{{ $level['id_level'] }}" {{ old('id_level') == $level['id_level'] ? 'selected' : '' }}>
                        {{ ucfirst($level['level_nama']) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
    </form>
    @endcomponent

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simulasi tombol Simpan untuk kirim form
        document.addEventListener('DOMContentLoaded', function () {
            const button = document.getElementById('saveCreateUser');
            const form = document.getElementById('createUserForm');

            if (button && form) {
                button.addEventListener('click', function (e) {
                    e.preventDefault(); // cegah default
                    form.submit(); // submit form
                });
            }

            new bootstrap.Modal(document.getElementById('createUserModal')).show();
        });

        // Auto-open modal untuk preview
        document.addEventListener('DOMContentLoaded', function () {
            new bootstrap.Modal(document.getElementById('createUserModal')).show();
        });
    </script>
</body>

</html>