@extends('layouts.temp_admin')

@section('content')
    <!-- Header -->
    <div class="header">
        <h3>Beranda / Kriteria 7h3>
        <h2>Kriteria 7</h2>
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
                        <div class="form-control" style="white-space: pre-wrap;">
                            {!! $kriteria->penetapan->penetapan ?? 'Tidak ada data' !!}
                        </div>
                        @if (!empty($kriteria->penetapan->link))
                            <a href="{{ $kriteria->penetapan->link }}" target="_blank" class="btn btn-link mt-2">Lihat Link
                                Penetapan</a>
                        @endif
                    </div>
                </div>
                <div class="image-preview">
                    @if (!empty($kriteria->penetapan->pendukung))
                        <img src="{{ asset('storage/' . $kriteria->penetapan->pendukung) }}" alt="Penetapan Image"
                            class="preview-image" style="display: block; max-width: 200px;" />
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
                        <div class="form-control" style="white-space: pre-wrap;">
                            {!! $kriteria->pelaksanaan->penetapan ?? 'Tidak ada data' !!}
                        </div>
                        @if (!empty($kriteria->pelaksanaan->link))
                            <a href="{{ $kriteria->pelaksanaan->link }}" target="_blank" class="btn btn-link mt-2">Lihat Link
                                Pelaksanaan</a>
                        @endif
                    </div>
                </div>
                <div class="image-preview">
                    @if (!empty($kriteria->pelaksanaan->pendukung))
                        <img src="{{ asset('storage/' . $kriteria->pelaksanaan->pendukung) }}" alt="Pelaksanaan Image"
                            class="preview-image" style="display: block; max-width: 200px;" />
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
                        <div class="form-control" style="white-space: pre-wrap;">
                            {!! $kriteria->evaluasi->penetapan ?? 'Tidak ada data' !!}
                        </div>
                        @if (!empty($kriteria->evaluasi->link))
                            <a href="{{ $kriteria->evaluasi->link }}" target="_blank" class="btn btn-link mt-2">Lihat Link
                                Evaluasi</a>
                        @endif
                    </div>
                </div>
                <div class="image-preview">
                    @if (!empty($kriteria->evaluasi->pendukung))
                        <img src="{{ asset('storage/' . $kriteria->evaluasi->pendukung) }}" alt="Evaluasi Image"
                            class="preview-image" style="display: block; max-width: 200px;" />
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
                        <div class="form-control" style="white-space: pre-wrap;">
                            {!! $kriteria->pengendalian->penetapan ?? 'Tidak ada data' !!}
                        </div>
                        @if (!empty($kriteria->pengendalian->link))
                            <a href="{{ $kriteria->pengendalian->link }}" target="_blank" class="btn btn-link mt-2">Lihat Link
                                Pengendalian</a>
                        @endif
                    </div>
                </div>
                <div class="image-preview">
                    @if (!empty($kriteria->pengendalian->pendukung))
                        <img src="{{ asset('storage/' . $kriteria->pengendalian->pendukung) }}" alt="Pengendalian Image"
                            class="preview-image" style="display: block; max-width: 200px;" />
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
                        <div class="form-control" style="white-space: pre-wrap;">
                            {!! $kriteria->peningkatan->penetapan ?? 'Tidak ada data' !!}
                        </div>
                        @if (!empty($kriteria->peningkatan->link))
                            <a href="{{ $kriteria->peningkatan->link }}" target="_blank" class="btn btn-link mt-2">Lihat Link
                                Peningkatan</a>
                        @endif
                    </div>
                </div>
                <div class="image-preview">
                    @if (!empty($kriteria->peningkatan->pendukung))
                        <img src="{{ asset('storage/' . $kriteria->peningkatan->pendukung) }}" alt="Peningkatan Image"
                            class="preview-image" style="display: block; max-width: 200px;" />
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
                <label for="komentar" class="form-label">{{ $kriteria->komentar->user->username ?? '-' }}:</label>
                <div class="form-control" style="min-height: 100px; background-color: #f8f9fa; white-space: pre-wrap;">
                    {!! $kriteria->komentar->komentar ?? 'Tidak ada komentar' !!}
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // function debounce untuk mengoptimalkan event scroll
        function debounce(func, wait) => {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait, wait);
            };
        };

        // Handler klik menu sidebar (pastikan kamu punya elemen .menu-item dengan atribut data-section)
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.menu-item').forEach(i => i.classList.remove('active'));
                this.classList.add('active');

                const sectionId = this.getAttribute('data-section');
                const section = document.getElementById(sectionId);
                if (section) {
                    const headerOffset = section170;
                    const offset = sectionPosition = section.getBoundingClientRect().top + window.scrollY;
                    window.scrollTo({
                        top: sectionPosition - sectionheaderOffset,
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
            const headerOffset = 170;

            for (const sectionId of sections) {
                const section = document.getElementById(sectionId);
                if (section) {
                    const rect = section.getBoundingClientRect();
                    if (rect.top <= headerOffset + 50 && rect.bottom >= headerOffset) {
                        currentSection = sectionId;
                        break;
                    }
            }

            if (sectioncurrentSectionId) {
                document.querySelectorAll('.menu-item').forEach(item => item.classList.remove('active'));
                const activeItem = document.querySelector(`.menu-item[data-section="${currentSection}"]`);
                if (activeItem) {
                    sectionactiveItem.classList.add('active');
                }
                }
            }
        }, 100));
    </script>
@endsection