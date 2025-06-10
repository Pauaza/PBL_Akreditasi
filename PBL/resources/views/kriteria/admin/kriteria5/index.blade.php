```html
@extends('layouts.temp_datatables')

@section('content')
    <!-- Header -->
    <div class="header">
        <h3>Home / Kriteria 5</h3>
        <h2>Kriteria 5</h2>
    </div>

    <!-- Spacer untuk Header Fixed -->
    <div style="height: 50px;"></div>

    <!-- Card Content -->
    <div class="card">
        <div class="card-header">
            <h5>Status Validasi</h5>
            <button class="add-button"><a href="/kriteria/admin/kriteria5/create">Tambah Data</a></button>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="form-container">
                    <table class="dashboard-table">
                        <thead>
                            <tr>
                                <th>Nama Kriteria</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->kriteria->nama_kriteria ?? '-' }}</td>
                                    <td>
                                        @php
                                            // Jika status_kps atau status_kajur 'rev', maka langsung status = ditolak
                                            if ($item->status_kps === 'rev' || $item->status_kajur === 'rev') {
                                                $status = 'rev'; // di sini 'rev' tetap untuk label 'ditolak'
                                            } else {
                                                $accKpsKajur = $item->status_kps === 'acc' && $item->status_kajur === 'acc';
                                                $accKjmDirektur =
                                                    $item->status_kjm === 'acc' && $item->status_direktur === 'acc';

                                                if ($accKpsKajur && $accKjmDirektur) {
                                                    $status = 'acc';
                                                } elseif (in_array('rev', [$item->status_kjm, $item->status_direktur])) {
                                                    $status = 'rev'; // jika rev dari kjm/direktur juga dianggap ditolak
                                                } else {
                                                    $status = 'progress';
                                                }
                                            }
                                        @endphp


                                        @if ($status === 'acc')
                                            <span class="status-btn acc">Acc</span>
                                        @elseif ($status === 'rev')
                                            <span class="status-btn ditolak">Ditolak</span>
                                        @else
                                            <span class="status-btn on-progress">On Progress</span>
                                        @endif
                                    </td>

                                    <td class="action-icons">
                                        <a href="{{ url('/kriteria/admin/kriteria5/view/' . $item->id_detail_kriteria) }}">
                                            <button class="action-button"><img src="{{ asset('assets/icon/view.png') }}" alt="View Icon"></button>
                                        </a>

                                        @if ($status === 'progress' || $status === 'rev')
                                            <a href="{{ url('/kriteria/admin/kriteria5/edit/' . $item->id_detail_kriteria) }}">
                                                <button class="action-button"><img src="{{ asset('assets/icon/edit.png') }}" alt="Edit Icon"></button>
                                            </a>
                                        @endif

                                        @if ($status === 'acc')
                                            <a href="{{ url('/kriteria/admin/kriteria5/print/' . $item->id_detail_kriteria) }}">
                                                <button class="action-button"><img src="{{ asset('assets/icon/print.png') }}" alt="Print Icon"></button>
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
@endsection
```