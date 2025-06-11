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
                    <a href="{{ route('superAdmin.user.create') }}" class="btn btn-primary"
                        style="padding: 6px 12px; font-size: 14px; background-color: #315287; color: white; border-radius: 5px; text-decoration: none;">
                        + Tambah User
                    </a>
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
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->level->level_nama ?? '-' }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-button"
                                                onclick="window.location.href='{{ route('superAdmin.user.view', $user->id_user) }}'"
                                                title="View">
                                                <img src="{{ url('assets/icon/view.png') }}" alt="View Icon">
                                            </button>
                                            <button class="action-button"
                                                onclick="window.location.href='{{ route('superAdmin.user.edit', $user->id_user) }}'"
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
@endsection