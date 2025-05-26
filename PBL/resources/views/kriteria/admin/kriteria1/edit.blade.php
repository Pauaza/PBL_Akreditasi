@extends('layouts.temp_admin')

@section('content')
    <!-- Header -->
    <div class="header">
        <h3>Home / Kriteria 1 / Edit</h3>
        <h2>Edit Kriteria 1</h2>
    </div>

    <!-- Spacer untuk Header Fixed -->
    <div style="height: 50px;"></div>

    <form method="POST" action="{{ route('kriteria.update', $kriteria->id_detail_kriteria) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="hidden" name="id_kriteria" value="1">

        <!-- Bagian 1: Penetapan -->
        <div class="card">
            <div class="card-header">
                <h5>Penetapan</h5>
            </div>
            <div class="card-body">
                <div style="display: flex; align-items: center; gap: 20px;">
                    <div class="form-container">
                        <div class="col-md-9 mb-3">
                            <label for="penetapan" class="form-label"
                                style="font-size: large; color: #1e293b">Penetapan:</label>
                            <textarea name="penetapan" id="penetapan" class="form-control @error('penetapan') is-invalid @enderror"
                                placeholder="Masukkan penetapan">{{ old('penetapan', $kriteria->penetapan->penetapan ?? '') }}</textarea>
                            @error('penetapan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="upload-photo">
                        <span class="upload-text">+ Upload</span>
                        <input type="file" name="file_penetapan" class="file-input" style="display: none;"
                            accept="image/*,application/pdf">
                        <img src="{{ $kriteria->penetapan->pendukung ? asset('storage/' . $kriteria->penetapan->pendukung) : '' }}"
                            alt="Preview" class="preview-image"
                            style="{{ $kriteria->penetapan->pendukung ? 'display:block' : 'display:none' }}" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian 2: Pelaksanaan -->
        <div class="card">
            <div class="card-header">
                <h5>Pelaksanaan</h5>
            </div>
            <div class="card-body">
                <div style="display: flex; align-items: center; gap: 20px;">
                    <div class="form-container">
                        <div class="col-md-9 mb-3">
                            <label for="pelaksanaan" class="form-label"
                                style="font-size: large; color: #1e293b">Pelaksanaan:</label>
                            <textarea name="pelaksanaan" id="pelaksanaan" class="form-control @error('pelaksanaan') is-invalid @enderror"
                                placeholder="Masukkan pelaksanaan">{{ old('pelaksanaan', $kriteria->pelaksanaan->penetapan ?? '') }}</textarea>
                            @error('pelaksanaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="upload-photo">
                        <span class="upload-text">+ Upload</span>
                        <input type="file" name="file_pelaksanaan" class="file-input" style="display: none;"
                            accept="image/*,application/pdf">
                        <img src="{{ $kriteria->pelaksanaan->pendukung ? asset('storage/' . $kriteria->pelaksanaan->pendukung) : '' }}"
                            alt="Preview" class="preview-image"
                            style="{{ $kriteria->pelaksanaan->pendukung ? 'display:block' : 'display:none' }}" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian 3: Evaluasi -->
        <div class="card">
            <div class="card-header">
                <h5>Evaluasi</h5>
            </div>
            <div class="card-body">
                <div style="display: flex; align-items: center; gap: 20px;">
                    <div class="form-container">
                        <div class="col-md-9 mb-3">
                            <label for="evaluasi" class="form-label"
                                style="font-size: large; color: #1e293b">Evaluasi:</label>
                            <textarea name="evaluasi" id="evaluasi" class="form-control @error('evaluasi') is-invalid @enderror"
                                placeholder="Masukkan evaluasi">{{ old('evaluasi', $kriteria->evaluasi->penetapan ?? '') }}</textarea>
                            @error('evaluasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="upload-photo">
                        <span class="upload-text">+ Upload</span>
                        <input type="file" name="file_evaluasi" class="file-input" style="display: none;"
                            accept="image/*,application/pdf">
                        <img src="{{ $kriteria->evaluasi->pendukung ? asset('storage/' . $kriteria->evaluasi->pendukung) : '' }}"
                            alt="Preview" class="preview-image"
                            style="{{ $kriteria->evaluasi->pendukung ? 'display:block' : 'display:none' }}" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian 4: Pengendalian -->
        <div class="card">
            <div class="card-header">
                <h5>Pengendalian</h5>
            </div>
            <div class="card-body">
                <div style="display: flex; align-items: center; gap: 20px;">
                    <div class="form-container">
                        <div class="col-md-9 mb-3">
                            <label for="pengendalian" class="form-label"
                                style="font-size: large; color: #1e293b">Pengendalian:</label>
                            <textarea name="pengendalian" id="pengendalian" class="form-control @error('pengendalian') is-invalid @enderror"
                                placeholder="Masukkan pengendalian">{{ old('pengendalian', $kriteria->pengendalian->penetapan ?? '') }}</textarea>
                            @error('pengendalian')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="upload-photo">
                        <span class="upload-text">+ Upload</span>
                        <input type="file" name="file_pengendalian" class="file-input" style="display: none;"
                            accept="image/*,application/pdf">
                        <img src="{{ $kriteria->pengendalian->pendukung ? asset('storage/' . $kriteria->pengendalian->pendukung) : '' }}"
                            alt="Preview" class="preview-image"
                            style="{{ $kriteria->pengendalian->pendukung ? 'display:block' : 'display:none' }}" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian 5: Peningkatan -->
        <div class="card">
            <div class="card-header">
                <h5>Peningkatan</h5>
            </div>
            <div class="card-body">
                <div style="display: flex; align-items: center; gap: 20px;">
                    <div class="form-container">
                        <div class="col-md-9 mb-3">
                            <label for="peningkatan" class="form-label"
                                style="font-size: large; color: #1e293b">Peningkatan:</label>
                            <textarea name="peningkatan" id="peningkatan" class="form-control @error('peningkatan') is-invalid @enderror"
                                placeholder="Masukkan peningkatan">{{ old('peningkatan', $kriteria->peningkatan->penetapan ?? '') }}</textarea>
                            @error('peningkatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="upload-photo">
                        <span class="upload-text">+ Upload</span>
                        <input type="file" name="file_peningkatan" class="file-input" style="display: none;"
                            accept="image/*,application/pdf">
                        <img src="{{ $kriteria->peningkatan->pendukung ? asset('storage/' . $kriteria->peningkatan->pendukung) : '' }}"
                            alt="Preview" class="preview-image"
                            style="{{ $kriteria->peningkatan->pendukung ? 'display:block' : 'display:none' }}" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Submit/Save -->
        <div class="button-group" style="margin-top: 20px;">
            <button type="submit" name="action" value="update" class="btn-blue">Update</button>
        </div>
    </form>

    <!-- Comments Section -->
    <div class="card">
        <div class="card-header">
            <h4>Comments:</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="comment">Direktur:</label>
                <textarea name="comment" id="comment" readonly>
                    {{ $kriteria->komentar->komentar ?? 'Tidak ada komentar' }}
                </textarea>
            </div>
        </div>
    </div>

    <script src="https://cdn.tiny.cloud/1/1bjp48je8qidj72md96na5rj62hlodgqbonp4y20d4cibjom/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#peningkatan, textarea#pengendalian, textarea#evaluasi, textarea#pelaksanaan, textarea#penetapan',
            plugins: 'tables lists link image',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>
    <!-- Upload Button Handler with Preview -->
    <script>
        document.querySelectorAll('.upload-photo').forEach((container) => {
            const fileInput = container.querySelector('.file-input');
            const previewImage = container.querySelector('.preview-image');
            const uploadText = container.querySelector('.upload-text');

            container.addEventListener('click', () => {
                if (fileInput) fileInput.click();
            });

            fileInput.addEventListener('change', function(event) {
                if (event.target.files.length > 0) {
                    const file = event.target.files[0];
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewImage.style.display = 'block';
                        uploadText.style.display = 'none';
                    };

                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
