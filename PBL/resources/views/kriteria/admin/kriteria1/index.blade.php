@extends('layouts.temp_datatables')

@section('content')
    <!-- Header -->
    <div class="header">
        <h3>Home / Kriteria 1</h3>
        <h2>Kriteria 1</h2>
    </div>

    <!-- Spacer untuk Header Fixed -->
    <div style="height: 50px;"></div>

    <!-- Card Content -->
    <div class="card">
        <div class="card-header">
            <h5>Status Validasi</h5>
            <button class="add-button"><a href="/kriteria/admin/kriteria1/create">Tambah Data</button>
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
                        <tr>
                            <td></td>
                            <td>
                                <span class="status-btn acc">Acc</span>
                            </td>
                            <td class="action-icons">
                                <button><img src="{{ asset('assets/icon/view.png') }}" alt="View Icon"></button>
                                <button><img src="{{ asset('assets/icon/edit.png') }}" alt="Edit Icon"></button>
                                <button><img src="{{ asset('assets/icon/print.png') }}" alt="Print Icon"></button>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <span class="status-btn on-progress">On Progress</span>
                            </td>
                            <td class="action-icons">
                                <button><img src="{{ asset('assets/icon/view.png') }}" alt="View Icon"></button>
                                <button><img src="{{ asset('assets/icon/edit.png') }}" alt="Edit Icon"></button>
                                <button><img src="{{ asset('assets/icon/print.png') }}" alt="Print Icon"></button>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <span class="status-btn selesai">Selesai</span>
                            </td>
                            <td class="action-icons">
                                <button><img src="{{ asset('assets/icon/view.png') }}" alt="View Icon"></button>
                                <button><img src="{{ asset('assets/icon/edit.png') }}" alt="Edit Icon"></button>
                                <button><img src="{{ asset('assets/icon/print.png') }}" alt="Print Icon"></button>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <span class="status-btn acc">Acc</span>
                            </td>
                            <td class="action-icons">
                                <button><img src="{{ asset('assets/icon/view.png') }}" alt="View Icon"></button>
                                <button><img src="{{ asset('assets/icon/edit.png') }}" alt="Edit Icon"></button>
                                <button><img src="{{ asset('assets/icon/print.png') }}" alt="Print Icon"></button>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <span class="status-btn ditolak">Ditolak</span>
                            </td>
                            <td class="action-icons">
                                <button><img src="{{ asset('assets/icon/view.png') }}" alt="View Icon"></button>
                                <button><img src="{{ asset('assets/icon/edit.png') }}" alt="Edit Icon"></button>
                                <button><img src="{{ asset('assets/icon/print.png') }}" alt="Print Icon"></button>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <span class="status-btn ditolak">Ditolak</span>
                            </td>
                            <td class="action-icons">
                                <button><img src="{{ asset('assets/icon/view.png') }}" alt="View Icon"></button>
                                <button><img src="{{ asset('assets/icon/edit.png') }}" alt="Edit Icon"></button>
                                <button><img src="{{ asset('assets/icon/print.png') }}" alt="Print Icon"></button>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <span class="status-btn on-progress">On Progress</span>
                            </td>
                            <td class="action-icons">
                                <button><img src="{{ asset('assets/icon/view.png') }}" alt="View Icon"></button>
                                <button><img src="{{ asset('assets/icon/edit.png') }}" alt="Edit Icon"></button>
                                <button><img src="{{ asset('assets/icon/print.png') }}" alt="Print Icon"></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection