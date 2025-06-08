@extends('layouts.temp_datatablesSuperAdmin')

@section('content')
    <!-- Header -->
    <div class="header">
        <div>
            <h3>Super Admin / Kriteria</h3>
            <h2>Kriteria Configuration</h2>
        </div>
    </div>


    <!-- Dashboard Container -->
    <div class="dashboard-container">
        <div class="card">
            <div class="card-title">
                <h5>Table Kriteria</h5>
                <div class="search-container">
                    <div class="search-bar">
                        <input type="text" placeholder="Search...">
                        <img src="https://img.icons8.com/ios-filled/50/315287/search--v1.png" alt="Search Icon"
                            class="search-icon">
                    </div>
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

            <div class="card-content">
                <div class="card-body">
                    <table class="dashboard-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kriteria</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample Data (Replace with dynamic data as needed) -->
                            @php
                                $index = 1;
                            @endphp
                            @foreach ($kriterias as $kriteria)
                                <tr>
                                    <td>{{ $index++ }}</td>
                                    <td>{{ $kriteria->nama_kriteria }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-button"
                                                onclick="window.location.href='{{ route('superAdmin.kriteria.view', $kriteria->id_kriteria) }}'"
                                                title="View">
                                                <img src="{{ url('assets/icon/view.png') }}" alt="View Icon">
                                            </button>
                                            <button class="action-button"
                                                onclick="window.location.href='{{ route('superAdmin.kriteria.edit', $kriteria->id_kriteria) }}'"
                                                title="Edit">
                                                <img src="{{ url('assets/icon/edit.png') }}" alt="Edit Icon">
                                            </button>
                                            <form id="deleteForm{{ $kriteria->id_kriteria }}"
                                                action="{{ route('superAdmin.kriteria.delete', $kriteria->id_kriteria) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="action-button" title="Delete"
                                                    onclick="confirmDelete('{{ $kriteria->id_kriteria }}')">
                                                    <img src="{{ url('assets/icon/delete.png') }}" alt="Delete Icon">
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function confirmDelete(id) {
        if (confirm('Yakin ingin menghapus data kriteria ini?')) {
            document.getElementById('deleteForm' + id).submit();
        }
    }
</script>