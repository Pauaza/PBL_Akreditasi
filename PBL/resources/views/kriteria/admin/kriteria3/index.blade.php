@extends('layouts.temp_datatables')

@section('content')
    <!-- Header -->
    <div class="header">
        <h3>Home / Kriteria 3</h3>
        <h2>Kriteria 3</h2>
    </div>

    <!-- Spacer untuk Header Fixed -->
    <div style="height: 50px;"></div>

    <!-- Card Content -->
    <div class="card">
        <div class="card-header">
            <h5>Status Validasi</h5>
            <button class="add-button"><a href="/kriteria/admin/kriteria3/create">Tambah Data</a></button>
        </div>
        <div class="card-body">
            <div class="form-container">
                <table>
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
                                    @if ($item->status_validator === 'acc')
                                        <span class="status-btn acc">Acc</span>
                                    @elseif ($item->status_validator === 'rev')
                                        <span class="status-btn ditolak">Ditolak</span>
                                    @else
                                        <span class="status-btn on-progress">On Progress</span>
                                    @endif
                                </td>
                                <td class="action-icons">
                                    <a href="{{ url('/kriteria/admin/kriteria3/view/' . $item->id_detail_kriteria) }}">
                                        <button><img src="{{ asset('assets/icon/view.png') }}" alt="View Icon"></button>
                                    </a>
                                    <a href="{{ url('/kriteria/admin/kriteria3/edit/' . $item->id_detail_kriteria) }}">
                                        <button><img src="{{ asset('assets/icon/edit.png') }}" alt="Edit Icon"></button>
                                    </a>
                                    <a href="{{ url('/kriteria/admin/kriteria3/print/' . $item->id_detail_kriteria) }}">
                                        <button><img src="{{ asset('assets/icon/print.png') }}" alt="Print Icon"></button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection