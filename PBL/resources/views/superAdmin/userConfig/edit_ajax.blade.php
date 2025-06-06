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
    @include('layouts.temp_modal', [
        'modalId' => 'editUserModal',
        'modalTitle' => 'Edit Data User',
        'cancelButton' => ['text' => 'Kembali', 'class' => 'btn-danger'],
        'actionButton' => ['text' => 'Simpan', 'class' => 'btn-primary', 'id' => 'saveEditUser'],
        'slot' => '
            <form id="editUserForm">
                <input type="hidden" id="editUserId" value="1">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" id="editUsername" class="form-control" value="admin1" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" id="editNama" class="form-control" value="Audrics">
                </div>
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <input type="text" id="editRole" class="form-control" value="Admin">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" id="editPassword" class="form-control" value="">
                    <small class="form-text text-muted">*Kosongkan jika tidak memakai password yang sudah ada</small>
                </div>
            </form>
        '
    ])

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simulasi tombol Simpan untuk preview
        document.getElementById('saveEditUser').addEventListener('click', function() {
            alert('Simulasi: Data berhasil disimpan!');
            bootstrap.Modal.getInstance(document.getElementById('editUserModal')).hide();
        });

        // Fungsi untuk membuka modal edit
        function showEditUser() {
            new bootstrap.Modal(document.getElementById('editUserModal')).show();
        }

        // Auto-open modal untuk preview
        document.addEventListener('DOMContentLoaded', function() {
            showEditUser();
        });
    </script>
</body>
</html>