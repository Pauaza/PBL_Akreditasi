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
        <div class="card-title">
            <h5>Status Validasi</h5>
            <button class="add-button"><a href="/kriteria/admin/kriteria3/create">Tambah Data</a></button>
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
                                  <td>
                                        @php
                                            $createdAt = \Carbon\Carbon::parse($item->created_at)->setTimezone('Asia/Jakarta');
                                            $updatedAt = $item->updated_at ? \Carbon\Carbon::parse($item->updated_at)->setTimezone('Asia/Jakarta') : null;
                                            $isUpdated = $updatedAt && $updatedAt->greaterThan($createdAt);
                                            // Debugging
                                            \Log::info('Tanggal Akses Debug', [
                                                'id_detail_kriteria' => $item->id_detail_kriteria,
                                                'created_at' => $createdAt->toDateTimeString(),
                                                'updated_at' => $updatedAt ? $updatedAt->toDateTimeString() : null,
                                                'is_updated' => $isUpdated
                                            ]);
                                        @endphp
                                        @if ($status === 'acc')
                                            Data Telah Di Validasi
                                        @elseif ($isUpdated)
                                            Data Diubah Pada {{ $updatedAt->format('d-m-Y H:i') }} WIB
                                        @else
                                            Data Ditambahkan Pada {{ $createdAt->format('d-m-Y H:i') }} WIB
                                        @endif
                                    </td>
                                    <td class="action-icons">
                                        <a href="{{ url('/kriteria/admin/kriteria3/view/' . $item->id_detail_kriteria) }}">
                                            <button class="action-button"><img src="{{ asset('assets/icon/view.png') }}"
                                                    alt="View Icon"></button>
                                        </a>

                                        @if ($status === 'progress' || $status === 'rev')
                                            <a href="{{ url('/kriteria/admin/kriteria3/edit/' . $item->id_detail_kriteria) }}">
                                                <button class="action-button"><img src="{{ asset('assets/icon/edit.png') }}"
                                                        alt="Edit Icon"></button>
                                            </a>
                                            <form
                                                action="{{ url('/kriteria/admin/kriteria3/delete/' . $item->id_detail_kriteria) }}"
                                                method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="action-button">
                                                    <img src="{{ asset('assets/icon/delete.png') }}" alt="Delete Icon">
                                                </button>
                                            </form>
                                        @endif

                                        @if ($status === 'acc')
                                            <a href="{{ url('/kriteria/admin/kriteria3/print/' . $item->id_detail_kriteria) }}">
                                                <button class="action-button"><img src="{{ asset('assets/icon/print.png') }}"
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
@endsection
```