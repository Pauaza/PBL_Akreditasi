<div class="modal-header">
    <h5 class="modal-title custom-modal-title">Edit Data Kriteria</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<form id="editKriteriaForm" action="{{ route('superAdmin.kriteria.update', $kriteria->id_kriteria) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="modal-body">
        <input type="hidden" name="id" value="{{ $kriteria->id_kriteria }}">

        <div class="mb-3">
            <label class="form-label custom-form-label">Nama Kriteria</label>
            <input type="text" name="nama_kriteria" id="editNamaKriteria" class="form-control custom-form-control"
                value="{{ $kriteria->nama_kriteria }}">
        </div>
    </div>

    <div class="modal-footer">
        <a href="{{ route('superAdmin.kriteria.index') }}" class="custom-modal-btn-back">
            Kembali
        </a>
        <button type="submit" class="custom-modal-btn">
            Simpan
        </button>
    </div>
</form>
