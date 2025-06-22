<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .checkbox-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            max-height: 200px; /* Batasi tinggi */
            overflow-y: auto; /* Tambahkan scroll vertikal */
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .checkbox-item input[type="checkbox"] {
            margin: 0;
            transform: scale(1.2);
        }

        .checkbox-item label {
            margin: 0;
            font-size: 14px;
            color: #333;
        }
    </style>
</head>

<body>
    @component('layouts.temp_modal', [
        'modalId' => 'createUserModal',
        'modalTitle' => 'Tambah Pengguna Baru',
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#saveCreateUser').on('click', function(e) {
                e.preventDefault();
                var formData = $('#createUserForm').serializeArray();
                var hakAkses = $('input[name="hak_akses[]"]:checked').map(function() {
                    return this.value;
                }).get();
                formData.push({name: 'hak_akses', value: hakAkses});

                $.ajax({
                    url: '{{ route('superAdmin.user.store') }}',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        alert('User berhasil ditambahkan!');
                        window.location.href = '{{ route('superAdmin.user.index') }}';
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan saat menambahkan user.');
                    }
                });
            });
    });
    </script>
</body>

</html>