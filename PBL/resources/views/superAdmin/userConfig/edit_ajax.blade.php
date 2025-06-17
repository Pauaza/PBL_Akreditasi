<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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
        'modalId' => 'editUserModal',
        'modalTitle' => 'Edit Data User',
        'cancelButtons' => [
            ['text' => 'Kembali ke Daftar User', 'class' => 'btn-danger', 'route' => route('superAdmin.user.index')],
        ],
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
                <label class="form-label">Hak Akses</label>
                <div class="checkbox-group">
                    @php
                        $kriteriaList = \App\Models\KriteriaModel::pluck('id_kriteria', 'nama_kriteria')->toArray();
                    @endphp
                    @foreach ($kriteriaList as $nama => $id)
                        <div class="checkbox-item">
                            <input type="checkbox" name="hak_akses[]" value="{{ $id }}"
                                {{ in_array($id, $user->getHakAkses() ?? []) ? 'checked' : '' }}>
                            <label>{{ $nama }}</label>
                        </div>
                    @endforeach
                </div>
                <small class="form-text text-muted">Centang satu atau lebih hak akses untuk admin</small>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
                <small class="form-text text-muted">*Kosongkan jika tidak mengubah password</small>
            </div>
        </form>
    @endcomponent
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#saveEditUser').on('click', function(e) {
                e.preventDefault();
                var hakAkses = $('input[name="hak_akses[]"]:checked').map(function() {
                    return this.value;
                }).get();
                var userId = $('input[name="id"]').val();

                $.ajax({
                    url: '{{ route('superAdmin.user.updateHakAkses', $user->id_user) }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        hak_akses: hakAkses,
                        id: userId
                    },
                    success: function(response) {
                        alert('Hak akses berhasil diperbarui!');
                        window.location.href = '{{ route('superAdmin.user.index') }}'; // Redirect to index.blade.php
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan saat memperbarui hak akses.');
                    }
                });
            });
        });
    </script>
</body>

</html>