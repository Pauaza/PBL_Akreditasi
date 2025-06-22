<!-- resources/views/superAdmin/kriteria/view_modal.blade.php -->

<div class="modal-header">
    <h5 class="modal-title custom-modal-title">Detail Data Kriteria</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">
    <div class="mb-3">
        <label class="form-label custom-form-label">Nama Kriteria</label>
        <input type="text" class="form-control custom-form-control" value="{{ $kriteria->nama_kriteria }}" readonly>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="custom-modal-btn" data-bs-dismiss="modal">Tutup</button>
</div>
