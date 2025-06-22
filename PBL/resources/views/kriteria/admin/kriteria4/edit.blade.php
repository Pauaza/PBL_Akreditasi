@extends('layouts.temp_admin')

@section('content')
    <!-- Header -->
    <div class="header">
        <h3>Beranda / Kriteria 4 / Edit</h3>
        <h2>Edit Kriteria 4</h2>
    </div>

    <!-- Spacer untuk Header Fixed -->
    <div style="height: 50px;"></div>

    @php
        $isSubmitted = $kriteria->isSubmitted();
        $disabled = $isSubmitted ? 'disabled' : '';
    @endphp

    <form id="kriteria4-edit" method="POST" action="{{ route('kriteria4.update', $kriteria->id_detail_kriteria) }}" enctype="multipart/form-data" {{ $disabled }}>
        @csrf
        @method('PUT')

        <input type="hidden" name="id_kriteria" value="4">
        <input type="hidden" name="form_action" id="form-action" value="submit">

        <!-- Bagian 1: Penetapan -->
        <div class="card" id="penetapan-section">
            <div class="card-header">
                <h5>Penetapan</h5>
            </div>
            <div class="card-body">
                <div style="display: flex; align-items: center; gap: 20px;">
                    <div class="form-container" style="flex: 1;">
                        <div class="col-md-9 mb-3">
                            <textarea name="penetapan" id="penetapan" class="form-control @error('penetapan') is-invalid @enderror" placeholder="Masukkan penetapan" {{ $disabled }}>{{ old('penetapan', $kriteria->penetapan->penetapan ?? '') }}</textarea>
                            @error('penetapan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-9 mb-3">
                            <br>
                            <label for="link_penetapan" class="form-label" style="font-size: medium; color: #315287">Link Penetapan:</label>
                            <input type="url" name="link_penetapan" id="link_penetapan" class="form-control @error('link_penetapan') is-invalid @enderror" placeholder="Masukkan link pendukung (URL)" value="{{ old('link_penetapan', $kriteria->penetapan->link ?? '') }}" {{ $disabled }}>
                            @error('link_penetapan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="upload-photo">
                        <span class="upload-text">+ Upload</span>
                        <input type="file" name="file_penetapan" class="file-input" style="display: none;" accept="image/*,application/pdf" {{ $disabled }}>
                        <img src="{{ $kriteria->penetapan->pendukung ? asset('storage/' . $kriteria->penetapan->pendukung) : '' }}" alt="Preview" class="preview-image" style="{{ $kriteria->penetapan->pendukung ? 'display:block' : 'display:none' }}" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian 2: Pelaksanaan -->
        <div class="card" id="pelaksanaan-section">
            <div class="card-header">
                <h5>Pelaksanaan</h5>
            </div>
            <div class="card-body">
                <div style="display: flex; align-items: center; gap: 20px;">
                    <div class="form-container" style="flex: 1;">
                        <div class="col-md-9 mb-3">
                            <textarea name="pelaksanaan" id="pelaksanaan" class="form-control @error('pelaksanaan') is-invalid @enderror" placeholder="Masukkan pelaksanaan" {{ $disabled }}>{{ old('pelaksanaan', $kriteria->pelaksanaan->penetapan ?? '') }}</textarea>
                            @error('pelaksanaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-9 mb-3">
                            <br>
                            <label for="link_pelaksanaan" class="form-label" style="font-size: medium; color: #315287">Link Pelaksanaan:</label>
                            <input type="url" name="link_pelaksanaan" id="link_pelaksanaan" class="form-control @error('link_pelaksanaan') is-invalid @enderror" placeholder="Masukkan link pendukung (URL)" value="{{ old('link_pelaksanaan', $kriteria->pelaksanaan->link ?? '') }}" {{ $disabled }}>
                            @error('link_pelaksanaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="upload-photo">
                        <span class="upload-text">+ Upload</span>
                        <input type="file" name="file_pelaksanaan" class="file-input" style="display: none;" accept="image/*,application/pdf" {{ $disabled }}>
                        <img src="{{ $kriteria->pelaksanaan->pendukung ? asset('storage/' . $kriteria->pelaksanaan->pendukung) : '' }}" alt="Preview" class="preview-image" style="{{ $kriteria->pelaksanaan->pendukung ? 'display:block' : 'display:none' }}" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian 3: Evaluasi -->
        <div class="card" id="evaluasi-section"> 
            <div class="card-header">
                <h5>Evaluasi</h5>
            </div>
            <div class="card-body">
                <div style="display: flex; align-items: center; gap: 20px;">
                    <div class="form-container" style="flex: 1;">
                        <div class="col-md-9 mb-3">
                            <textarea name="evaluasi" id="evaluasi" class="form-control @error('evaluasi') is-invalid @enderror" placeholder="Masukkan evaluasi" {{ $disabled }}>{{ old('evaluasi', $kriteria->evaluasi->penetapan ?? '') }}</textarea>
                            @error('evaluasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-9 mb-3">
                            <br>
                            <label for="link_evaluasi" class="form-label" style="font-size: medium; color: #315287">Link Evaluasi:</label>
                            <input type="url" name="link_evaluasi" id="link_evaluasi" class="form-control @error('link_evaluasi') is-invalid @enderror" placeholder="Masukkan link pendukung (URL)" value="{{ old('link_evaluasi', $kriteria->evaluasi->link ?? '') }}" {{ $disabled }}>
                            @error('link_evaluasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="upload-photo">
                        <span class="upload-text">+ Upload</span>
                        <input type="file" name="file_evaluasi" class="file-input" style="display: none;" accept="image/*,application/pdf" {{ $disabled }}>
                        <img src="{{ $kriteria->evaluasi->pendukung ? asset('storage/' . $kriteria->evaluasi->pendukung) : '' }}" alt="Preview" class="preview-image" style="{{ $kriteria->evaluasi->pendukung ? 'display:block' : 'display:none' }}" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian 4: Pengendalian -->
        <div class="card" id="pengendalian-section">
            <div class="card-header">
                <h5>Pengendalian</h5>
            </div>
            <div class="card-body">
                <div style="display: flex; align-items: center; gap: 20px;">
                    <div class="form-container" style="flex: 1;">
                        <div class="col-md-9 mb-3">
                            <textarea name="pengendalian" id="pengendalian" class="form-control @error('pengendalian') is-invalid @enderror" placeholder="Masukkan pengendalian" {{ $disabled }}>{{ old('pengendalian', $kriteria->pengendalian->penetapan ?? '') }}</textarea>
                            @error('pengendalian')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-9 mb-3">
                            <br>
                            <label for="link_pengendalian" class="form-label" style="font-size: medium; color: #315287">Link Pengendalian:</label>
                            <input type="url" name="link_pengendalian" id="link_pengendalian" class="form-control @error('link_pengendalian') is-invalid @enderror" placeholder="Masukkan link pendukung (URL)" value="{{ old('link_pengendalian', $kriteria->pengendalian->link ?? '') }}" {{ $disabled }}>
                            @error('link_pengendalian')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="upload-photo">
                        <span class="upload-text">+ Upload</span>
                        <input type="file" name="file_pengendalian" class="file-input" style="display: none;" accept="image/*,application/pdf" {{ $disabled }}>
                        <img src="{{ $kriteria->pengendalian->pendukung ? asset('storage/' . $kriteria->pengendalian->pendukung) : '' }}" alt="Preview" class="preview-image" style="{{ $kriteria->pengendalian->pendukung ? 'display:block' : 'display:none' }}" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian 5: Peningkatan -->
        <div class="card" id="peningkatan-section">
            <div class="card-header">
                <h5>Peningkatan</h5>
            </div>
            <div class="card-body">
                <div style="display: flex; align-items: center; gap: 20px;">
                    <div class="form-container" style="flex: 1;">
                        <div class="col-md-9 mb-3">
                            <textarea name="peningkatan" id="peningkatan" class="form-control @error('peningkatan') is-invalid @enderror" placeholder="Masukkan peningkatan" {{ $disabled }}>{{ old('peningkatan', $kriteria->peningkatan->penetapan ?? '') }}</textarea>
                            @error('peningkatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-9 mb-3">
                            <br>
                            <label for="link_peningkatan" class="form-label" style="font-size: medium; color: #315287">Link Peningkatan:</label>
                            <input type="url" name="link_peningkatan" id="link_peningkatan" class="form-control @error('link_peningkatan') is-invalid @enderror" placeholder="Masukkan link pendukung (URL)" value="{{ old('link_peningkatan', $kriteria->peningkatan->link ?? '') }}" {{ $disabled }}>
                            @error('link_peningkatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="upload-photo">
                        <span class="upload-text">+ Upload</span>
                        <input type="file" name="file_peningkatan" class="file-input" style="display: none;" accept="image/*,application/pdf" {{ $disabled }}>
                        <img src="{{ $kriteria->peningkatan->pendukung ? asset('storage/' . $kriteria->peningkatan->pendukung) : '' }}" alt="Preview" class="preview-image" style="{{ $kriteria->peningkatan->pendukung ? 'display:block' : 'display:none' }}" />
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.tiny.cloud/1/aez3so5sai0j78w7i5ze78fm7kg0c8xmofpla04py4xfxh0f/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            // Initialize TinyMCE for textareas
            tinymce.init({
                selector: 'textarea#peningkatan, textarea#pengendalian, textarea#evaluasi, textarea#pelaksanaan, textarea#penetapan',
                plugins: 'tables lists link image',
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
                setup: function (editor) {
                    editor.on('change', function () {
                        editor.save(); // Sync TinyMCE content with textarea
                    });
                }
            });

            // Handle file upload preview
            document.querySelectorAll('.upload-photo').forEach((container) => {
                const fileInput = container.querySelector('.file-input');
                const previewImage = container.querySelector('.preview-image');
                const uploadText = container.querySelector('.upload-text');

                container.addEventListener('click', () => {
                    if (fileInput && !fileInput.disabled) fileInput.click();
                });

                fileInput.addEventListener('change', function(event) {
                    if (event.target.files.length > 0 && !event.target.disabled) {
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

            // Handle form submission with AJAX
            document.addEventListener('DOMContentLoaded', function () {
                const form = document.querySelector('#kriteria4-edit');
                const submitUrl = '{{ route('kriteria4.update', $kriteria->id_detail_kriteria) }}';

                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const formAction = document.getElementById('form-action').value;
                    let isValid = true;

                    // Client-side validation for submit action
                    if (formAction === 'submit') {
                        const requiredFields = [
                            'penetapan', 'link_penetapan',
                            'pelaksanaan', 'link_pelaksanaan',
                            'evaluasi', 'link_evaluasi',
                            'pengendalian', 'link_pengendalian',
                            'peningkatan', 'link_peningkatan'
                        ];

                        requiredFields.forEach(field => {
                            const input = form.querySelector(`[name="${field}"]`);
                            let value = input.value.trim();

                            // For TinyMCE textareas, get content from editor
                            if (input.tagName === 'TEXTAREA' && tinymce.get(input.id)) {
                                value = tinymce.get(input.id).getContent().trim();
                                input.value = value; // Sync textarea value with TinyMCE content
                            }

                            if (!value) {
                                isValid = false;
                                input.classList.add('is-invalid');
                                const feedback = input.nextElementSibling;
                                if (feedback && feedback.classList.contains('invalid-feedback')) {
                                    feedback.textContent = `${field.replace('_', ' ').toUpperCase()} wajib diisi.`;
                                }
                            } else {
                                input.classList.remove('is-invalid');
                            }
                        });
                    }

                    if (formAction === 'submit' && !isValid) {
                        showAlert(
                            'Semua field deskripsi dan link wajib diisi untuk submit!',
                            '{{ asset('assets/icon/cross.png') }}',
                            '#993a36'
                        );
                        return;
                    }

                    const formData = new FormData(form);
                    const csrfToken = form.querySelector('input[name="_token"]').value;

                    fetch(submitUrl, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(response => {
                        if (response.status === 302 || response.redirected) {
                            return response.text().then(() => {
                                fetch(window.location.href, { method: 'GET' })
                                    .then(res => res.text())
                                    .then(html => {
                                        if (html.includes('Data berhasil diperbarui')) {
                                            showAlert(
                                                'Perubahan Berhasil Disimpan',
                                                '{{ asset('assets/icon/checkmark.png') }}',
                                                '#315287'
                                            );
                                            setTimeout(() => {
                                                window.location.href = '{{ route('index.admin.kriteria4') }}';
                                            }, 2000);
                                        }
                                    });
                            });
                        }
                        if (!response.ok) {
                            return response.json().then(err => {
                                throw new Error(JSON.stringify(err));
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.status) {
                            showAlert(
                                'Perubahan Berhasil Disimpan',
                                '{{ asset('assets/icon/checkmark.png') }}',
                                '#315287'
                            );
                            if (formAction === 'submit') {
                                form.querySelectorAll('textarea, input[type="url"], input[type="file"]').forEach(el => el.disabled = true);
                            }
                            setTimeout(() => {
                                window.location.href = data.redirect || '{{ route('index.admin.kriteria4') }}';
                            }, 2000);
                        }
                    })
                    .catch(error => {
                        showAlert(
                            'Gagal menyimpan data: ' + error.message,
                            '{{ asset('assets/icon/cross.png') }}',
                            '#993a36'
                        );
                    });
                });

                // Function to display success alert
                function showAlert(message, iconSrc, backgroundColor) {
                    const existingAlert = document.querySelector('.custom-alert');
                    if (existingAlert) existingAlert.remove();

                    const alertDiv = document.createElement('div');
                    alertDiv.className = 'custom-alert';
                    alertDiv.style.position = 'fixed';
                    alertDiv.style.top = '20px';
                    alertDiv.style.right = '20px';
                    alertDiv.style.padding = '15px 30px';
                    alertDiv.style.backgroundColor = backgroundColor;
                    alertDiv.style.color = '#fff';
                    alertDiv.style.borderRadius = '10px';
                    alertDiv.style.display = 'flex';
                    alertDiv.style.alignItems = 'center';
                    alertDiv.style.gap = '10px';
                    alertDiv.style.boxShadow = '0 4px 10px rgba(0, 0, 0, 0.2)';
                    alertDiv.style.zIndex = '1000';
                    alertDiv.style.fontFamily = 'Montserrat, sans-serif';
                    alertDiv.style.fontSize = '14px';
                    alertDiv.style.fontWeight = '500';

                    const icon = document.createElement('img');
                    icon.src = iconSrc;
                    icon.style.width = '24px';
                    icon.style.height = '24px';
                    icon.style.objectFit = 'contain';
                    icon.onerror = () => console.error('Gagal memuat ikon:', iconSrc);

                    const messageSpan = document.createElement('span');
                    messageSpan.textContent = message;

                    alertDiv.appendChild(icon);
                    alertDiv.appendChild(messageSpan);
                    document.body.appendChild(alertDiv);

                    setTimeout(() => {
                        alertDiv.remove();
                    }, 3000);
                }
            });
        </script>

        <div class="button-group" style="margin-top: 20px;">
            <button type="submit" name="form_action" value="draft" class="btn-blues" onclick="document.getElementById('form-action').value='draft'" {{ $disabled }}>Simpan sebagai Draf</button>
            <button type="submit" name="form_action" value="submit" class="btn-greens" onclick="document.getElementById('form-action').value='submit'" {{ $disabled }}>Submit</button>
        </div>
    </form>
@endsection