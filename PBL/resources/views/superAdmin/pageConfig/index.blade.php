@extends('layouts.temp_datatablesSuperAdmin')

@section('content')
    <!-- Header -->
    <div class="header">
        <div>
            <h3>SuperAdmin / Konten</h3>
            <h2>Konfigurasi Konten</h2>
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
        <!-- Dashboard Table -->
        <div class="card mb-4">
            <div class="card-title">
                <h5>Tabel Dashboard</h5>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <table class="dashboard-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Page ID</th>
                                <th>Tab/Section</th>
                                <th>Content Preview</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $dashboardPages = isset($pages['dashboard-main']) ? ['dashboard-main' => $pages['dashboard-main']] : [];
                            @endphp
                            @forelse($dashboardPages as $page_id => $tabs)
                                @foreach ($tabs as $tab => $data)
                                    @php
                                        $tabCount = count($tabs);
                                        $index = ($loop->parent->index * $tabCount) + $loop->index + 1;
                                    @endphp
                                    <tr>
                                        <td>{{ $index }}</td>
                                        <td>{{ $page_id }}</td>
                                        <td>{{ ucfirst($tab) }}</td>
                                        <td>{{ Str::limit($data['content'] ?? '', 50) }}</td>
                                        <td>
                                            <div class="action-buttons" style="display: flex; gap: 5px;">
                                                <button class="action-button" onclick="loadViewModal('{{ route('superAdmin.page.view.tab', ['id' => $page_id, 'tab' => $tab]) }}')" title="View">
                                                    <img src="{{ url('assets/icon/view.png') }}" alt="View Icon">
                                                </button>
                                                <button class="action-button" onclick="loadEditModal('{{ route('superAdmin.page.edit.tab', ['id' => $page_id, 'tab' => $tab]) }}')" title="Edit">
                                                    <img src="{{ url('assets/icon/edit.png') }}" alt="Edit Icon">
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @empty
                                <tr>
                                    <td colspan="5" style="text-align:center;">Tidak ada data dashboard.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Login Table -->
        <div class="card mb-4">
            <div class="card-title">
                <h5>Tabel Login</h5>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <table class="dashboard-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Page ID</th>
                                <th>Tab/Section</th>
                                <th>Content Preview</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $loginPages = isset($pages['login-form']) ? ['login-form' => $pages['login-form']] : [];
                            @endphp
                            @forelse($loginPages as $page_id => $tabs)
                                @foreach ($tabs as $tab => $data)
                                    @php
                                        $tabCount = count($tabs);
                                        $index = ($loop->parent->index * $tabCount) + $loop->index + 1;
                                    @endphp
                                    <tr>
                                        <td>{{ $index }}</td>
                                        <td>{{ $page_id }}</td>
                                        <td>{{ ucfirst($tab) }}</td>
                                        <td>{{ Str::limit($data['content'] ?? '', 50) }}</td>
                                        <td>
                                            <div class="action-buttons" style="display: flex; gap: 5px;">
                                                <button class="action-button" onclick="loadViewModal('{{ route('superAdmin.page.view.tab', ['id' => $page_id, 'tab' => $tab]) }}')" title="View">
                                                    <img src="{{ url('assets/icon/view.png') }}" alt="View Icon">
                                                </button>
                                                <button class="action-button" onclick="loadEditModal('{{ route('superAdmin.page.edit.tab', ['id' => $page_id, 'tab' => $tab]) }}')" title="Edit">
                                                    <img src="{{ url('assets/icon/edit.png') }}" alt="Edit Icon">
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @empty
                                <tr>
                                    <td colspan="5" style="text-align:center;">Tidak ada data login.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Landing Table -->
        <div class="card">
            <div class="card-title">
                <h5>Tabel Landing</h5>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <table class="dashboard-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Page ID</th>
                                <th>Tab/Section</th>
                                <th>Content Preview</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $landingPages = isset($pages['landing-hero']) ? ['landing-hero' => $pages['landing-hero']] : [];
                            @endphp
                            @forelse($landingPages as $page_id => $tabs)
                                @foreach ($tabs as $tab => $data)
                                    @php
                                        $tabCount = count($tabs);
                                        $index = ($loop->parent->index * $tabCount) + $loop->index + 1;
                                    @endphp
                                    <tr>
                                        <td>{{ $index }}</td>
                                        <td>{{ $page_id }}</td>
                                        <td>{{ ucfirst($tab) }}</td>
                                        <td>{{ Str::limit($data['content'] ?? '', 50) }}</td>
                                        <td>
                                            <div class="action-buttons" style="display: flex; gap: 5px;">
                                                <button class="action-button" onclick="loadViewModal('{{ route('superAdmin.page.view.tab', ['id' => $page_id, 'tab' => $tab]) }}')" title="View">
                                                    <img src="{{ url('assets/icon/view.png') }}" alt="View Icon">
                                                </button>
                                                <button class="action-button" onclick="loadEditModal('{{ route('superAdmin.page.edit.tab', ['id' => $page_id, 'tab' => $tab]) }}')" title="Edit">
                                                    <img src="{{ url('assets/icon/edit.png') }}" alt="Edit Icon">
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @empty
                                <tr>
                                    <td colspan="5" style="text-align:center;">Tidak ada data landing.</td>
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
                new bootstrap.Modal(document.getElementById('editPageModal')).show();
            }).fail(function() {
                alert('Gagal memuat modal edit.');
            });
        }

        function loadViewModal(url) {
            $.get(url, function(data) {
                $('#modalContainer').html(data);
                new bootstrap.Modal(document.getElementById('viewPageModal')).show();
            }).fail(function() {
                alert('Gagal memuat modal detail.');
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            $('#modalContainer').on('hidden.bs.modal', function() {
                window.location.href = '{{ route('superAdmin.page.index') }}';
            });
            $('#modalContainer').on('hidden.bs.modal', function() {
                document.body.style.paddingRight = '';
                document.body.classList.remove('modal-open');
            });
            $('#modalContainer').on('show.bs.modal', function() {
                const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
                document.body.style.paddingRight = scrollbarWidth + 'px';
            });
        });
    </script>

    <style>
        body.modal-open { overflow: hidden !important; padding-right: 0 !important; }
        .dashboard-container { width: 100%; margin: 0 auto; box-sizing: border-box; transition: none !important; }
        .card, .dashboard-table { width: 100%; margin: 0; transition: none !important; }
        .action-button { cursor: pointer; transition: all 0.2s ease-in-out; padding: 6px; border: none; background: none; }
        .action-button:hover { background-color: #f0f0f0; transform: scale(1.1); border-radius: 4px; }
        .action-button img { width: 24px; height: 24px; }
        .modal-backdrop { position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 1040; }
        .modal { z-index: 1050; }
        .card.mb-4 { margin-bottom: 1.5rem; }

        .card h5{
            font-size: 20px;
            font-weight: 600;
        }
    </style>
@endsection