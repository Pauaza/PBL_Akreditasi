@extends('layouts.temp_admin')

@section('content')
    <!-- Header -->
    <div class="header">
        <h3>Home / Kriteria 1 </h3>
        <h2>Kriteria 1</h2>
    </div>

    <!-- Spacer untuk Header Fixed -->
    <div style="height: 50px;"></div>

    <!-- Bagian 1: Penetapan -->
    <div class="card" id="penetapan-section">
        <div class="card-header">
            <h5>Penetapan</h5>
        </div>
        <div class="card-body">
            <div style="display: flex; align-items: flex-start; gap: 20px;">
                <div class="form-container">
                    <div class="col-md-9 mb-3">
                        <label class="form-label">Penetapan :</label>
                        <div class="form-control">
                            {!! $kriteria->penetapan ?? 'Tidak ada data' !!}
                        </div>
                    </div>
                </div>
                <div class="image-preview">
                    @if ($kriteria->penetapan)
                        <img src="{{ asset($kriteria->pendukung) }}" alt="Penetapan Image" class="preview-image" style="display: block; max-width: 200px;" />
                    @else
                        <p>Tidak ada gambar</p>
                    @endif
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
            <div style="display: flex; align-items: flex-start; gap: 20px;">
                <div class="form-container">
                    <div class="col-md-9 mb-3">
                        <label class="form-label">Pelaksanaan :</label>
                        <div class="form-control">
                            {!! $kriteria->pelaksanaan ?? 'Tidak ada data' !!}
                        </div>
                    </div>
                </div>
                <div class="image-preview">
                    @if ($kriteria->pelaksanaan)
                        <img src="{{ asset($kriteria->pendukung) }}" alt="Pelaksanaan Image" class="preview-image" style="display: block; max-width: 200px;" />
                    @else
                        <p>Tidak ada gambar</p>
                    @endif
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
            <div style="display: flex; align-items: flex-start; gap: 20px;">
                <div class="form-container">
                    <div class="col-md-9 mb-3">
                        <label class="form-label">Evaluasi :</label>
                        <div class="form-control">
                            {!! $kriteria->evaluasi ?? 'Tidak ada data' !!}
                        </div>
                    </div>
                </div>
                <div class="image-preview">
                    @if ($kriteria->evaluasi)
                        <img src="{{ asset($kriteria->pendukung) }}" alt="Evaluasi Image" class="preview-image" style="display: block; max-width: 200px;" />
                    @else
                        <p>Tidak ada gambar</p>
                    @endif
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
            <div style="display: flex; align-items: flex-start; gap: 20px;">
                <div class="form-container">
                    <div class="col-md-9 mb-3">
                        <label class="form-label">Pengendalian :</label>
                        <div class="form-control"">
                            {!! $kriteria->pengendalian ?? 'Tidak ada data' !!}
                        </div>
                    </div>
                </div>
                <div class="image-preview">
                    @if ($kriteria->pengendalian)
                        <img src="{{ asset($kriteria->pendukung) }}" alt="Pengendalian Image" class="preview-image" style="display: block; max-width: 200px;" />
                    @else
                        <p>Tidak ada gambar</p>
                    @endif
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
            <div style="display: flex; align-items: flex-start; gap: 20px;">
                <div class="form-container">
                    <div class="col-md-9 mb-3">
                        <label class="form-label">Peningkatan :</label>
                        <div class="form-control">
                            {!! $kriteria->peningkatan ?? 'Tidak ada data' !!}
                        </div>
                    </div>
                </div>
                <div class="image-preview">
                    @if ($kriteria->peningkatan)
                        <img src="{{ asset($kriteria->pendukung) }}" alt="Peningkatan Image" class="preview-image" style="display: block; max-width: 200px;" />
                    @else
                        <p>Tidak ada gambar</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Comments Section -->
    <div class="card" id="comments-section">
        <div class="card-header">
            <h4>Comments:</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="comment">Direktur:</label>
                <div class="form-control" style="min-height: 100px; background-color: #f8f9fa;">
                    {!! $kriteria->comment ?? 'Tidak ada komentar' !!}
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fungsi debounce untuk mengoptimalkan event scroll
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        // Handler untuk klik menu sidebar
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault(); // Mencegah perilaku default
                // Hapus kelas active dari semua menu item
                document.querySelectorAll('.menu-item').forEach(i => {
                    i.classList.remove('active');
                });
                // Tambahkan kelas active ke item yang diklik
                this.classList.add('active');

                // Scroll ke section yang sesuai
                const sectionId = this.getAttribute('data-section');
                const section = document.getElementById(sectionId);
                if (section) {
                    const headerOffset = 170; // Sesuaikan dengan tinggi header
                    const sectionPosition = section.getBoundingClientRect().top + window.scrollY;
                    window.scrollTo({
                        top: sectionPosition - headerOffset,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Highlight menu sidebar berdasarkan posisi scroll
        window.addEventListener('scroll', debounce(() => {
            const sections = [
                'penetapan-section',
                'pelaksanaan-section',
                'evaluasi-section',
                'pengendalian-section',
                'peningkatan-section',
                'comments-section'
            ];

            let currentSection = '';
            const headerOffset = 170; // Sesuaikan dengan tinggi header
            const viewportHeight = window.innerHeight;

            for (const sectionId of sections) {
                const section = document.getElementById(sectionId);
                if (section) {
                    const rect = section.getBoundingClientRect();
                    // Deteksi section yang terlihat di viewport dengan offset
                    if (rect.top <= headerOffset + 50 && rect.bottom >= headerOffset) {
                        currentSection = sectionId;
                        break;
                    }
                }
            }

            if (currentSection) {
                document.querySelectorAll('.menu-item').forEach(item => {
                    item.classList.remove('active');
                });
                const activeItem = document.querySelector(`.menu-item[data-section="${currentSection}"]`);
                if (activeItem) {
                    activeItem.classList.add('active');
                }
            }
        }, 100));
    </script>
@endsection