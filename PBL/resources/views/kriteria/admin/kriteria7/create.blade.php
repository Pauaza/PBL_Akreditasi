@extends('layouts.temp_admin')

@section('content')
    <!-- Header -->
    <div class="header">
        <h3>Home / Kriteria 7 </h3>
        <h2>Kriteria 7</h2>
    </div>

    <!-- Spacer untuk Header Fixed -->
    <div style="height: 50px;"></div>
    
    <form method="POST" action="{{ route('kriteria7.submit') }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id_kriteria" value="7">

        <!-- Bagian 1: Penetapan -->
        <div class="card">
            <div class="card-header">
                <h5>Penetapan</h5>
            </div>
            <div class="card-body">
                <div style="display: flex; align-items: center; gap: 20px;">
                    <div class="form-container" style="flex: 1;">
                        <div class="col-md-9 mb-3">
                            <label for="penetapan" class="form-label" style="font-size: large; color: #1e293b">Penetapan
                                :</label>
                            <textarea name="penetapan" id="penetapan" class="form-control @error('penetapan') is-invalid @enderror"
                                placeholder="Masukkan penetapan">{{ old('penetapan') }}</textarea>
                            @error('penetapan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Link Penetapan -->
                        <div class="col-md-9 mb-3">
                            <label for="link_penetapan" class="form-label" style="font-size: large; color: #1e293b">Link Penetapan :</label>
                            <input type="url" name="link" id="link_penetapan" class="form-control @error('link_penetapan') is-invalid @enderror"
                                placeholder="Masukkan link penetapan" value="{{ old('link_penetapan') }}">
                            @error('link_penetapan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="upload-photo">
                        <span class="upload-text">+ Upload</span>
                        <input type="file" name="pendukung" class="file-input" style="display: none;" accept="image/*">
                        <img src="{{ session('penetapan') ?? '' }}" alt="Preview" class="preview-image"
                            style="{{ session('penetapan') ? 'display:block' : 'display:none' }}" />
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
                    <div class="form-container" style="flex: 1;">
                        <div class="col-md-9 mb-3">
                            <label for="pelaksanaan" class="form-label" style="font-size: large; color: #1e293b">Pelaksanaan
                                :</label>
                            <textarea name="pelaksanaan" id="pelaksanaan" class="form-control @error('pelaksanaan') is-invalid @enderror"
                                placeholder="Masukkan pelaksanaan">{{ old('pelaksanaan') }}</textarea>
                            @error('pelaksanaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Link Pelaksanaan -->
                        <div class="col-md-9 mb-3">
                            <label for="link_pelaksanaan" class="form-label" style="font-size: large; color: #1e293b">Link Pelaksanaan :</label>
                            <input type="url" name="link_pelaksanaan" id="link_pelaksanaan" class="form-control @error('link_pelaksanaan') is-invalid @enderror"
                                placeholder="Masukkan link pelaksanaan" value="{{ old('link_pelaksanaan') }}">
                            @error('link_pelaksanaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="upload-photo">
                        <span class="upload-text">+ Upload</span>
                        <input type="file" name="file_pelaksanaan" class="file-input" style="display: none;" accept="image/*">
                        <img src="{{ session('pelaksanaan') ?? '' }}" alt="Preview" class="preview-image"
                            style="{{ session('pelaksanaan') ? 'display:block' : 'display:none' }}" />
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
                    <div class="form-container" style="flex: 1;">
                        <div class="col-md-9 mb-3">
                            <label for="evaluasi" class="form-label" style="font-size: large; color: #1e293b">Evaluasi
                                :</label>
                            <textarea name="evaluasi" id="evaluasi" class="form-control @error('evaluasi') is-invalid @enderror"
                                placeholder="Masukkan evaluasi">{{ old('evaluasi') }}</textarea>
                            @error('evaluasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Link Evaluasi -->
                        <div class="col-md-9 mb-3">
                            <label for="link_evaluasi" class="form-label" style="font-size: large; color: #1e293b">Link Evaluasi :</label>
                            <input type="url" name="link_evaluasi" id="link_evaluasi" class="form-control @error('link_evaluasi') is-invalid @enderror"
                                placeholder="Masukkan link evaluasi" value="{{ old('link_evaluasi') }}">
                            @error('link_evaluasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="upload-photo">
                        <span class="upload-text">+ Upload</span>
                        <input type="file" name="file_evaluasi" class="file-input" style="display: none;" accept="image/*">
                        <img src="{{ session('evaluasi') ?? '' }}" alt="Preview" class="preview-image"
                            style="{{ session('evaluasi') ? 'display:block' : 'display:none' }}" />
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
                    <div class="form-container" style="flex: 1;">
                        <div class="col-md-9 mb-3">
                            <label for="pengendalian" class="form-label" style="font-size: large; color: #1e293b">Pengendalian
                                :</label>
                            <textarea name="pengendalian" id="pengendalian" class="form-control @error('pengendalian') is-invalid @enderror"
                                placeholder="Masukkan pengendalian">{{ old('pengendalian') }}</textarea>
                            @error('pengendalian')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Link Pengendalian -->
                        <div class="col-md-9 mb-3">
                            <label for="link_pengendalian" class="form-label" style="font-size: large; color: #1e293b">Link Pengendalian :</label>
                            <input type="url" name="link_pengendalian" id="link_pengendalian" class="form-control @error('link_pengendalian') is-invalid @enderror"
                                placeholder="Masukkan link pengendalian" value="{{ old('link_pengendalian') }}">
                            @error('link_pengendalian')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="upload-photo">
                        <span class="upload-text">+ Upload</span>
                        <input type="file" name="file_pengendalian" class="file-input" style="display: none;" accept="image/*">
                        <img src="{{ session('pengendalian') ?? '' }}" alt="Preview" class="preview-image"
                            style="{{ session('pengendalian') ? 'display:block' : 'display:none' }}" />
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
                    <div class="form-container" style="flex: 1;">
                        <div class="col-md-9 mb-3">
                            <label for="peningkatan" class="form-label" style="font-size: large; color: #1e293b">Peningkatan
                                :</label>
                            <textarea name="peningkatan" id="peningkatan" class="form-control @error('peningkatan') is-invalid @enderror"
                                placeholder="Masukkan peningkatan">{{ old('peningkatan') }}</textarea>
                            @error('peningkatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Link Peningkatan -->
                        <div class="col-md-9 mb-3">
                            <label for="link_peningkatan" class="form-label" style="font-size: large; color: #1e293b">Link Peningkatan :</label>
                            <input type="url" name="link_peningkatan" id="link_peningkatan" class="form-control @error('link_peningkatan') is-invalid @enderror"
                                placeholder="Masukkan link peningkatan" value="{{ old('link_peningkatan') }}">
                            @error('link_peningkatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="upload-photo">
                        <span class="upload-text">+ Upload</span>
                        <input type="file" name="file_peningkatan" class="file-input" style="display: none;" accept="image/*">
                        <img src="{{ session('peningkatan') ?? '' }}" alt="Preview" class="preview-image"
                            style="{{ session('peningkatan') ? 'display:block' : 'display:none' }}" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Submit/Save -->
        <div class="button-group" style="margin-top: 20px;">
            <button type="submit" name="action" value="submit" class="btn-blue">Submit</button>
        </div>
        <div class="button-group" style="margin-top: 20px;">
            <button type="submit" name="action" value="submit" class="btn-blue">Save</button>
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
                    Pada Bab penetapan ada yang salah di point ke-1 yaitu dokumen tidak ada tangan dari Ketua Jurusan
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
                        previewImage.style.display = 'block'; // Show preview image
                        uploadText.style.display = 'none'; // Hide upload text
                    };

                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection