@extends('layouts.temp_datatablesSuperAdmin')

@section('content')
    <!-- Header -->
    <div class="header">
        <div>
            <h3>Super Admin / User</h3>
            <h2>User Configuration</h2>
        </div>
    </div>

    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    @if (session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif

    <!-- Dashboard Container -->
    <div class="dashboard-container">
        <div class="card">
            <div class="card-title" style="display: flex; justify-content: space-between; align-items: center;">
                <h5>Table User</h5>
                <div style="display: flex; gap: 10px; align-items: center;">
                    <button onclick="loadCreateModal('{{ route('superAdmin.user.create') }}')" class="btn btn-primary add-user-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16" style="margin-right: 8px;">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                        Tambah User
                    </button>
                    <div class="search-container">
                        <div class="search-bar">
                            <input type="text" placeholder="Search..." style="height: 30px;">
                            <img src="https://img.icons8.com/ios-filled/50/315287/search--v1.png" alt="Search Icon"
                                class="search-icon">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-content">
                <div class="card-body">
                    <table class="dashboard-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Hak Akses</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        {{ $user->hakAkses->count() > 0 ? $user->hakAkses->pluck('id_kriteria')->implode(', ') : '-' }}
                                    </td>
                                    <td>
                                        <div class="action-buttons" style="display: flex; gap: 5px;">
                                            <button class="action-button"
                                                onclick="loadViewModal('{{ route('superAdmin.user.view', $user->id_user) }}')"
                                                title="View">
                                                <img src="{{ url('assets/icon/view.png') }}" alt="View Icon">
                                            </button>
                                            <button class="action-button"
                                                onclick="loadEditModal('{{ route('superAdmin.user.edit', $user->id_user) }}')"
                                                title="Edit">
                                                <img src="{{ url('assets/icon/edit.png') }}" alt="Edit Icon">
                                            </button>
                                            <form action="{{ route('superAdmin.user.delete', $user->id_user) }}" method="POST"
                                                style="display:inline;"
                                                onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="action-button" title="Delete">
                                                    <img src="{{ url('assets/icon/delete.png') }}" alt="Delete Icon">
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" style="text-align:center;">Tidak ada data user.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Container -->
    <div id="modalContainer"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function loadEditModal(url) {
            $.get(url, function(data) {
                $('#modalContainer').html(data);
                new bootstrap.Modal(document.getElementById('editUserModal')).show();
            }).fail(function() {
                alert('Gagal memuat modal edit.');
            });
        }

        function loadViewModal(url) {
            $.get(url, function(data) {
                $('#modalContainer').html(data);
                new bootstrap.Modal(document.getElementById('detailUserModal')).show();
            }).fail(function() {
                alert('Gagal memuat modal detail.');
            });
        }

        function loadCreateModal(url) {
            $.get(url, function(data) {
                $('#modalContainer').html(data);
                new bootstrap.Modal(document.getElementById('createUserModal')).show();
            }).fail(function() {
                alert('Gagal memuat modal tambah user.');
            });
        }

        // Tutup modal dan refresh halaman
        document.addEventListener('DOMContentLoaded', function() {
            $('#modalContainer').on('hidden.bs.modal', function() {
                window.location.href = '{{ route('superAdmin.user.index') }}';
            });

            // Ensure body padding is reset when modal is hidden
            $('#modalContainer').on('hidden.bs.modal', function() {
                document.body.style.paddingRight = '';
                document.body.classList.remove('modal-open');
            });

            // Ensure body padding is set correctly when modal is shown
            $('#modalContainer').on('show.bs.modal', function() {
                // Calculate scrollbar width
                const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
                document.body.style.paddingRight = scrollbarWidth + 'px';
            });
        });
    </script>

    <style>
        /* Prevent layout shift when modal is open */
        body.modal-open {
            overflow: hidden !important;
            padding-right: 0 !important;
        }

        /* Ensure dashboard-container remains stable */
        .dashboard-container {
            width: 100%;
            margin: 0 auto;
            box-sizing: border-box;
            transition: none !important; /* Prevent any zoom/transition effects */
        }

        /* Stabilize card and table */
        .card, .dashboard-table {
            width: 100%;
            margin: 0;
            transition: none !important; /* Prevent any zoom/transition effects */
        }

        /* Action button styles */
        .action-button {
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            padding: 6px;
            border: none;
            background: none;
        }

        .action-button:hover {
            background-color: #f0f0f0;
            transform: scale(1.1);
            border-radius: 4px;
        }

        .action-button img {
            width: 24px;
            height: 24px;
        }

        /* Add user button styles */
        .add-user-btn {
            display: flex;
            align-items: center;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 500;
            background-color: #315287;
            color: white;
            border-radius: 8px;
            border: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .add-user-btn:hover {
            background-color: #274273;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .add-user-btn:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Ensure modal backdrop doesn't affect layout */
        .modal-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1040;
        }

        .modal {
            z-index: 1050;
        }
    </style>
@endsection