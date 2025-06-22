@extends('layouts.temp_admin')

@section('content')
    <!-- Header -->
    <div class="header">
        <h3>Beranda / Kriteria 8 </h3>
        <h2>Kriteria 8</h2>
    </div>

    <!-- Spacer untuk Header Fixed -->
    <div style="height: 50px;"></div>
    
    <form id="kriteria8" method="POST" action="{{ route('kriteria8.submit') }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id_kriteria" value="8">
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
                            <textarea name="penetapan" id="penetapan" class="form-control" placeholder="Masukkan penetapan">{{ old('penetapan') }}</textarea>
                        </div>

                        <!-- Input Link Penetapan -->
                        <div class="col-md-9 mb-3">
                            <br>
                            <label for="link_penetapan" class="form-label" style="font-size: medium; color: #315287">Link Penetapan :</label>
                            <input type="url" name="link_penetapan" id="link_penetapan" class="form-control" placeholder="Masukkan link penetapan" value="{{ old('link_penetapan') }}">
                        </div>
                    </div>
                    <div class="upload-photo">
                        <span class="upload-text">+ Upload</span>
                        <input type="file" name="file_penetapan" class="file-input" style="display: none;" accept="image/*,application/pdf">
                        <img src="{{ session('penetapan') ?? '' }}" alt="Preview" class="preview-image"
                            style="{{ session('penetapan') ? 'display:block' : 'display:none' }}" />
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
                            <textarea name="pelaksanaan" id="pelaksanaan" class="form-control" placeholder="Masukkan pelaksanaan">{{ old('pelaksanaan') }}</textarea>
                        </div>

                        <!-- Input Link Pelaksanaan -->
                        <div class="col-md-9 mb-3">
                            <br>
                            <label for="link_pelaksanaan" class="form-label" style="font-size: medium; color: #315287">Link Pelaksanaan :</label>
                            <input type="url" name="link_pelaksanaan" id="link_pelaksanaan" class="form-control" placeholder="Masukkan link pelaksanaan" value="{{ old('link_pelaksanaan') }}">
                        </div>
                    </div>
                    <div class="upload-photo">
                        <span class="upload-text">+ Upload</span>
                        <input type="file" name="file_pelaksanaan" class="file-input" style="display: none;" accept="image/*,application/pdf">
                        <img src="{{ session('pelaksanaan') ?? '' }}" alt="Preview" class="preview-image"
                            style="{{ session('pelaksanaan') ? 'display:block' : 'display:none' }}" />
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
                            <textarea name="evaluasi" id="evaluasi" class="form-control" placeholder="Masukkan evaluasi">{{ old('evaluasi') }}</textarea>
                        </div>

                        <!-- Input Link Evaluasi -->
                        <div class="col-md-9 mb-3">
                            <br>
                            <label for="link_evaluasi" class="form-label" style="font-size: medium; color: #315287">Link Evaluasi :</label>
                            <input type="url" name="link_evaluasi" id="link_evaluasi" class="form-control" placeholder="Masukkan link evaluasi" value="{{ old('link_evaluasi') }}">
                        </div>
                    </div>
                    <div class="upload-photo">
                        <span class="upload-text">+ Upload</span>
                        <input type="file" name="file_evaluasi" class="file-input" style="display: none;" accept="image/*,application/pdf">
                        <img src="{{ session('evaluasi') ?? '' }}" alt="Preview" class="preview-image"
                            style="{{ session('evaluasi') ? 'display:block' : 'display:none' }}" />
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
                            <textarea name="pengendalian" id="pengendalian" class="form-control" placeholder="Masukkan pengendalian">{{ old('pengendalian') }}</textarea>
                        </div>

                        <!-- Input Link Pengendalian -->
                        <div class="col-md-9 mb-3">
                            <br>
                            <label for="link_pengendalian" class="form-label" style="font-size: medium; color: #315287">Link Pengendalian :</label>
                            <input type="url" name="link_pengendalian" id="link_pengendalian" class="form-control" placeholder="Masukkan link pengendalian" value="{{ old('link_pengendalian') }}">
                        </div>
                    </div>
                    <div class="upload-photo">
                        <span class="upload-text">+ Upload</span>
                        <input type="file" name="file_pengendalian" class="file-input" style="display: none;" accept="image/*,application/pdf">
                        <img src="{{ session('pengendalian') ?? '' }}" alt="Preview" class="preview-image"
                            style="{{ session('pengendalian') ? 'display:block' : 'display:none' }}" />
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
                            <textarea name="peningkatan" id="peningkatan" class="form-control" placeholder="Masukkan peningkatan">{{ old('peningkatan') }}</textarea>
                        </div>

                        <!-- Input Link Peningkatan -->
                        <div class="col-md-9 mb-3">
                            <br>
                            <label for="link_peningkatan" class="form-label" style="font-size: medium; color: #315287">Link Peningkatan :</label>
                            <input type="url" name="link_peningkatan" id="link_peningkatan" class="form-control" placeholder="Masukkan link peningkatan" value="{{ old('link_peningkatan') }}">
                        </div>
                    </div>
                    <div class="upload-photo">
                        <span class="upload-text">+ Upload</span>
                        <input type="file" name="file_peningkatan" class="file-input" style="display: none;" accept="image/*,application/pdf">
                        <img src="{{ session('peningkatan') ?? '' }}" alt="Preview" class="preview-image"
                            style="{{ session('peningkatan') ? 'display:block' : 'display:none' }}" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Submit/Save -->
        <div class="button-group" style="margin-top: 20px;">
            <button type="submit" name="form_action" value="draft" class="btn-blues" onclick="document.getElementById('form-action').value='draft'">Simpan sebagai Draf</button>
            <button type="submit" name="form_action" value="submit" class="btn-greens" onclick="document.getElementById('form-action').value='submit'">Submit</button>
        </div>
    </form>

    <script src="https://cdn.tiny.cloud/1/aez3so5sai0j78w7i5ze78fm7kg0c8xmofpla04py4xfxh0f/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        // Initialize TinyMCE for textareas
        tinymce.init({
            selector: 'textarea#peningkatan, textarea#pengendalian, textarea#evaluasi, textarea#pelaksanaan, textarea#penetapan',
            plugins: 'lists link image',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | link image',
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

        // Handle form submission with AJAX
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('#kriteria8');
            const submitUrl = '{{ route('kriteria8.submit') }}';

            form.addEventListener('submit', function (e) {
                e.preventDefault();

                // Client-side validation for required fields
                const requiredFields = [
                    'penetapan', 'link_penetapan',
                    'pelaksanaan', 'link_pelaksanaan',
                    'evaluasi', 'link_evaluasi',
                    'pengendalian', 'link_pengendalian',
                    'peningkatan', 'link_peningkatan'
                ];
                let isValid = true;

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

                if (!isValid) {
                    showAlert(
                        'Semua field deskripsi dan link wajib diisi!',
                        '{{ asset('assets/icon/cross.png') }}',
                        '#993a36'
                    );
                    return;
                }

                const formData = new FormData(form);
                const csrfToken = form.querySelector('input[name="_token"]').value;

                // Log data for debugging
                for (let [key, value] of formData.entries()) {
                    console.log(`FormData: ${key} = ${value}`);
                }
                console.log('Submit URL:', submitUrl);

                // Send AJAX request
                fetch(submitUrl, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(response => {
                    console.log('Status respons:', response.status);
                    if (response.status === 302 || response.redirected) {
                        return response.text().then(() => {
                            fetch(window.location.href, { method: 'GET' })
                                .then(res => res.text())
                                .then(html => {
                                    if (html.includes('Data berhasil disimpan')) {
                                        showAlert(
                                            'Data Berhasil Disimpan',
                                            '{{ asset('assets/icon/checkmark.png') }}',
                                            '#315287'
                                        );
                                        setTimeout(() => {
                                            window.location.href = '{{ route('index.admin.kriteria8') }}';
                                        }, 2000);
                                    } else {
                                        throw new Error('No success message found');
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
                    console.log('Data respons:', data);
                    if (data.status) {
                        showAlert(
                            'Data Berhasil Disimpan',
                            '{{ asset('assets/icon/checkmark.png') }}',
                            '#315287'
                        );
                        setTimeout(() => {
                            console.log('Redirect ke:', data.redirect);
                            window.location.href = data.redirect || '{{ route('index.admin.kriteria8') }}';
                        }, 2000);
                    } else {
                        let errorMessage = data.message || 'Gagal menyimpan data';
                        if (data.errors) {
                            errorMessage += ': ' + Object.values(data.errors).flat().join(', ');
                        }
                        showAlert(
                            errorMessage,
                            '{{ asset('assets/icon/cross.png') }}',
                            '#993a36'
                        );
                    }
                })
                .catch(error => {
                    console.error('Kesalahan AJAX:', error);
                    showAlert(
                        'Gagal menyimpan data: ' + error.message,
                        '{{ asset('assets/icon/cross.png') }}',
                        '#993a36'
                    );
                });
            });

            // Function to display alert
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

                console.log('Alert ditampilkan:', message);

                setTimeout(() => {
                    alertDiv.remove();
                }, 3000);
            }
        });
    </script>

    <style>
        .btn-blue {
            background-color: #315287;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }
        .btn-blue:hover {
            background-color: #263f6a;
        }
        .btn-green {
            background-color: #2e7d32;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }
        .btn-green:hover {
            background-color: #1b5e20;
        }
    </style>
@endsection