@extends('layouts.temp_datatables')

@section('content')
    <!-- Header -->
    <div class="header">
        <h3>Home / Kriteria 8</h3>
        <h2>Kriteria 8</h2>
    </div>

    <!-- Spacer untuk Header Fixed -->
    <div style="height: 50px;"></div>

    <!-- Card Content -->
    <div class="card">
        <div class="card-title">
            <h5>Status Validasi</h5>
            <button class="add-button"><a href="/kriteria/admin/kriteria8/create">Tambah Data</a></button>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="form-container">
                    <table class="dashboard-table">
                        <thead>
                            <tr>
                                <th>Nama Kriteria</th>
                                <th>Status</th>
                                <th>Keterangan Kriteria</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->kriteria->nama_kriteria ?? '-' }}</td>
                                    <td>
                                        @php
                                            // Logika status tetap sama
                                            if ($item->status_kps === 'rev' || $item->status_kajur === 'rev') {
                                                $status = 'rev';
                                            } else {
                                                $accKpsKajur =
                                                    $item->status_kps === 'acc' && $item->status_kajur === 'acc';
                                                $accKjmDirektur =
                                                    $item->status_kjm === 'acc' && $item->status_direktur === 'acc';
                                                if ($accKpsKajur && $accKjmDirektur) {
                                                    $status = 'acc';
                                                } elseif (
                                                    in_array('rev', [$item->status_kjm, $item->status_direktur])
                                                ) {
                                                    $status = 'rev';
                                                } else {
                                                    $status = $item->status_selesai === 'save' ? 'draft' : 'progress';
                                                }
                                            }
                                        @endphp
                                        @if ($status === 'acc')
                                            <span class="status-btn acc">Acc</span>
                                        @elseif ($status === 'rev')
                                            <span class="status-btn ditolak">Ditolak</span>
                                        @elseif ($status === 'draft')
                                            <span class="status-btn draft">Draf</span>
                                        @else
                                            <span class="status-btn on-progress">On Progress</span>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $createdAt = \Carbon\Carbon::parse($item->created_at)->setTimezone(
                                                'Asia/Jakarta',
                                            );
                                            $updatedAt = $item->updated_at
                                                ? \Carbon\Carbon::parse($item->updated_at)->setTimezone('Asia/Jakarta')
                                                : null;
                                            $isUpdated = $updatedAt && $updatedAt->greaterThan($createdAt);
                                            // Debugging
                                            \Log::info('Tanggal Akses Debug', [
                                                'id_detail_kriteria' => $item->id_detail_kriteria,
                                                'created_at' => $createdAt->toDateTimeString(),
                                                'updated_at' => $updatedAt ? $updatedAt->toDateTimeString() : null,
                                                'is_updated' => $isUpdated,
                                            ]);
                                        @endphp
                                        @if ($status === 'acc')
                                            Data Telah Di Validasi
                                        @elseif ($isUpdated)
                                            Data Diubah Pada {{ $updatedAt->format('d-m-Y H:i') }} WIB
                                        @elseif ($status === 'draft')
                                            Data Disimpan sebagai Draf Pada {{ $createdAt->format('d-m-Y H:i') }} WIB
                                        @else
                                            Data Ditambahkan Pada {{ $createdAt->format('d-m-Y H:i') }} WIB
                                        @endif
                                    </td>
                                    <td class="action-icons">
                                        <a href="{{ url('/kriteria/admin/kriteria8/view/' . $item->id_detail_kriteria) }}">
                                            <button class="action-button"><img src="{{ asset('assets/icon/view.png') }}"
                                                    alt="View Icon"></button>
                                        </a>
                                        @if (($status === 'progress' || $status === 'rev' || $status === 'draft') && $item->status_selesai !== 'submit')
                                            <a
                                                href="{{ url('/kriteria/admin/kriteria8/edit/' . $item->id_detail_kriteria) }}">
                                                <button class="action-button"><img src="{{ asset('assets/icon/edit.png') }}"
                                                        alt="Edit Icon"></button>
                                            </a>
                                            <form
                                                action="{{ url('/kriteria/admin/kriteria8/delete/' . $item->id_detail_kriteria) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="action-button delete-button"
                                                    data-id="{{ $item->id_detail_kriteria }}">
                                                    <img src="{{ asset('assets/icon/delete.png') }}" alt="Delete Icon">
                                                </button>
                                            </form>
                                        @endif
                                        @if ($status === 'acc')
                                            <a
                                                href="{{ url('/kriteria/admin/kriteria8/print/' . $item->id_detail_kriteria) }}">
                                                <button class="action-button"><img
                                                        src="{{ asset('assets/icon/print.png') }}"
                                                        alt="Print Icon"></button>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Alert Modal -->
    <div id="deleteAlert" class="delete-alert" style="display: none;">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
        <div class="delete-alert-content">
            <div class="delete-alert-bg" style="background: linear-gradient(135deg, #A63C38, #4A1C1B);"></div>
            <div class="delete-alert-overlay" style="background-image: url('{{ asset('assets/icon/warning.png') }}');">
            </div>
            <div class="delete-alert-text">
                <h3>Delete Alert</h3>
                <p>Apakah Anda yakin ingin menghapus data ini?</p>
                <div class="delete-alert-buttons">
                    <button class="btn-yes" onclick="confirmDelete()">Ya</button>
                    <button class="btn-no" onclick="cancelDelete()">Tidak</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .delete-alert {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 10000;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .delete-alert-content {
            position: relative;
            background: linear-gradient(135deg, #A63C38, #4A1C1B);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            width: 600px;
            z-index: 10001;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .delete-alert-overlay {
            position: absolute;
            top: -68px;
            left: -20px;
            width: 230px;
            height: 230px;
            background-image: url('{{ asset('assets/icon/warning.png') }}');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: top left;
            opacity: 0.35;
            z-index: 0;
            border-radius: 20px 0 0 0;
        }

        .delete-alert-text {
            position: relative;
            z-index: 2;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .delete-alert-text h3 {
            margin-bottom: 15px;
            font-size: 24px;
            font-weight: bold;
        }

        .delete-alert-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .btn-yes,
        .btn-no {
            padding: 10px 30px;
            border: none;
            border-radius: 999px;
            background-color: #fff;
            color: #4A1C1B;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-yes {
            color: #007bff;
        }

        .btn-yes:hover {
            background-color: #007bff;
            color: #fff;
        }

        .btn-no {
            color: #dc3545;
        }

        .btn-no:hover {
            background-color: #dc3545;
            color: #fff;
        }

       
    </style>

    <script>
        let currentDeleteForm = null;

        function showDeleteAlert(id) {
            const alert = document.getElementById('deleteAlert');
            if (alert) {
                alert.style.display = 'flex';
                currentDeleteForm = document.querySelector(
                    `form[action="${window.location.origin}/kriteria/admin/kriteria8/delete/${id}"]`);
            } else {
                console.log('Delete alert tidak ditemukan!');
            }
        }

        function confirmDelete() {
            const alert = document.getElementById('deleteAlert');
            if (alert && currentDeleteForm) {
                alert.style.display = 'none';
                currentDeleteForm.submit();
            } else {
                console.log('Form delete tidak ditemukan!');
            }
        }

        function cancelDelete() {
            const alert = document.getElementById('deleteAlert');
            if (alert) {
                alert.style.display = 'none';
                currentDeleteForm = null;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-button');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const id = this.getAttribute('data-id');
                    showDeleteAlert(id);
                });
            });
        });
    </script>
@endsection