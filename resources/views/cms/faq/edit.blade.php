@extends('upcube.central')
@section('datacontent')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit {{ $submenu }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $menu }}</a></li>
                                <li class="breadcrumb-item active">Edit {{ $submenu }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Alert Success -->
            {{-- @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Alert Error -->
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif --}}

            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title mb-4 text-primary">
                                <i class="fas fa-edit"></i> Form Edit FAQ
                            </h5>

                            <!-- Tampilkan Error Validasi -->
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <h6 class="alert-heading mb-3">
                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                        Terdapat kesalahan dalam pengisian form:
                                    </h6>
                                    <ul class="mb-0 ps-3">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="{{ route('faq_web.update', Cript::encryptString($faq->id)) }}" method="POST" id="faqForm">
                                @csrf
                                @method('PUT')
                                <div class="row g-3">

                                    <!-- Pilih Website -->
                                    <div class="col-md-3">
                                        <label for="nama_web" class="form-label">
                                            Pilih Website <span class="text-danger">*</span>
                                        </label>
                                        <select name="nama_web" id="nama_web"
                                                class="form-control @error('nama_web') is-invalid @enderror"
                                                required>
                                            <option value=""> -- Pilih Website -- </option>
                                            @foreach ($website as $data)
                                                <option value="{{ $data->id }}"
                                                    {{ (old('nama_web', $faq->id_web) == $data->id) ? 'selected' : '' }}
                                                    data-subweb="{{ $data->sub_web }}">
                                                    {{ $data->nama_web }} @if($data->sub_web) - {{ $data->sub_web }} @endif
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('nama_web')
                                            <div class="invalid-feedback">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- Pertanyaan -->
                                    <div class="col-md-3">
                                        <label for="pertanyaan" class="form-label">
                                            Pertanyaan <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="pertanyaan" id="pertanyaan"
                                               class="form-control @error('pertanyaan') is-invalid @enderror"
                                               placeholder="Masukkan pertanyaan FAQ"
                                               value="{{ old('pertanyaan', $faq->pertanyaan) }}"
                                               maxlength="255" required>
                                        @error('pertanyaan')
                                            <div class="invalid-feedback">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <small class="text-muted">Maksimal 255 karakter</small>
                                    </div>

                                    <!-- Keterangan -->
                                    <div class="col-md-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <input type="text" name="keterangan" id="keterangan"
                                               class="form-control @error('keterangan') is-invalid @enderror"
                                               placeholder="Masukkan keterangan (opsional)"
                                               value="{{ old('keterangan', $faq->keterangan) }}"
                                               maxlength="100">
                                        @error('keterangan')
                                            <div class="invalid-feedback">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <small class="text-muted">Maksimal 100 karakter</small>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-3">
                                        <label for="status1" class="form-label">
                                            Status <span class="text-danger">*</span>
                                        </label>
                                        <select name="status1" id="status1"
                                                class="form-select @error('status1') is-invalid @enderror" required>
                                            <option value=""> -- Pilih Status -- </option>
                                            <option value="aktif" {{ (old('status1', $faq->status) == 'aktif') ? 'selected' : '' }}>
                                                Aktif
                                            </option>
                                            <option value="nonaktif" {{ (old('status1', $faq->status) == 'nonaktif') ? 'selected' : '' }}>
                                                Nonaktif
                                            </option>
                                        </select>
                                        @error('status1')
                                            <div class="invalid-feedback">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- Jawaban -->
                                    <div class="col-12">
                                        <label for="jawaban" class="form-label">
                                            Jawaban <span class="text-danger">*</span>
                                        </label>
                                        <textarea id="elm1" name="jawaban" rows="5"
                                                  class="form-control @error('jawaban') is-invalid @enderror"
                                                  placeholder="Masukkan jawaban lengkap untuk FAQ">{{ old('jawaban', $faq->jawaban) }}</textarea>
                                        @error('jawaban')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <small class="text-muted">Jawaban wajib diisi dan minimal 10 karakter. Gunakan toolbar untuk formatting teks.</small>
                                    </div>
                                </div>

                                <!-- Tombol -->
                                <div class="mt-4 d-flex justify-content-end gap-2">
                                    <a href="{{ route('faq_web.index') }}" class="btn btn-light">
                                        <i class="fas fa-arrow-left me-1"></i> Kembali
                                    </a>
                                    <button type="submit" class="btn btn-warning" id="submitBtn">
                                        <i class="fas fa-save me-1"></i> Update FAQ
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        // Inisialisasi TinyMCE
        tinymce.init({
            selector: '#elm1',
            height: 400,
            menubar: 'file edit view insert format tools',
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor',
                'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | bold italic underline strikethrough | ' +
                     'alignleft aligncenter alignright alignjustify | ' +
                     'bullist numlist outdent indent | forecolor backcolor removeformat | ' +
                     'link image media | code help',
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });

                editor.on('init', function() {
                    // Set konten dari database
                    const jawabanContent = @json($faq->jawaban);
                    if (jawabanContent) {
                        editor.setContent(jawabanContent);
                    }
                });
            },
            content_style: `
                body {
                    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                    font-size: 14px;
                }
                .mce-content-body[data-mce-placeholder]:not(.mce-visualblocks)::before {
                    color: #6c757d;
                    font-style: italic;
                }
            `
        });

        // Validasi Form sebelum submit
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('faqForm');
            const submitBtn = document.getElementById('submitBtn');

            form.addEventListener('submit', function(e) {
                // Validasi field required
                const namaWeb = document.getElementById('nama_web').value;
                const pertanyaan = document.getElementById('pertanyaan').value.trim();
                const status1 = document.getElementById('status1').value;
                const jawaban = tinymce.get('elm1') ? tinymce.get('elm1').getContent().trim() : '';

                let isValid = true;
                let errorMessage = '';

                // Reset semua error state
                document.querySelectorAll('.is-invalid').forEach(el => {
                    el.classList.remove('is-invalid');
                });

                // Validasi Pilih Website
                if (!namaWeb) {
                    isValid = false;
                    errorMessage += '• Pilih Website wajib dipilih\n';
                    document.getElementById('nama_web').classList.add('is-invalid');
                }

                // Validasi Pertanyaan
                if (!pertanyaan) {
                    isValid = false;
                    errorMessage += '• Pertanyaan wajib diisi\n';
                    document.getElementById('pertanyaan').classList.add('is-invalid');
                } else if (pertanyaan.length > 255) {
                    isValid = false;
                    errorMessage += '• Pertanyaan maksimal 255 karakter\n';
                    document.getElementById('pertanyaan').classList.add('is-invalid');
                }

                // Validasi Status
                if (!status1) {
                    isValid = false;
                    errorMessage += '• Status wajib dipilih\n';
                    document.getElementById('status1').classList.add('is-invalid');
                }

                // Validasi Jawaban
                if (!jawaban) {
                    isValid = false;
                    errorMessage += '• Jawaban wajib diisi\n';
                    document.querySelector('[name="jawaban"]').classList.add('is-invalid');
                } else if (jawaban.replace(/<[^>]*>/g, '').length < 10) {
                    isValid = false;
                    errorMessage += '• Jawaban minimal 10 karakter (tanpa HTML tags)\n';
                    document.querySelector('[name="jawaban"]').classList.add('is-invalid');
                }

                if (!isValid) {
                    e.preventDefault();

                    // Tampilkan alert dengan semua error
                    if (typeof Swal !== 'undefined') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Form Belum Lengkap',
                            html: errorMessage.replace(/\n/g, '<br>'),
                            confirmButtonText: 'Mengerti',
                            confirmButtonColor: '#dc3545',
                            backdrop: true,
                            allowOutsideClick: false
                        });
                    } else {
                        alert('Harap lengkapi form:\n' + errorMessage);
                    }

                    return false;
                }

                // Tampilkan loading
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Memperbarui...';
                submitBtn.disabled = true;

                // Beri delay kecil agar user bisa melihat loading state
                setTimeout(() => {
                    form.submit();
                }, 100);
            });

            // Hapus error state saat user mulai mengisi/memilih
            document.getElementById('nama_web').addEventListener('change', function() {
                this.classList.remove('is-invalid');
            });

            document.getElementById('pertanyaan').addEventListener('input', function() {
                this.classList.remove('is-invalid');
            });

            document.getElementById('status1').addEventListener('change', function() {
                this.classList.remove('is-invalid');
            });

            document.getElementById('keterangan').addEventListener('input', function() {
                this.classList.remove('is-invalid');
            });

            // Auto update character count untuk pertanyaan
            const pertanyaanInput = document.getElementById('pertanyaan');
            const pertanyaanCounter = document.createElement('small');
            pertanyaanCounter.className = 'text-muted mt-1 d-block';
            pertanyaanCounter.textContent = pertanyaanInput.value.length + '/255 karakter';
            pertanyaanInput.parentNode.appendChild(pertanyaanCounter);

            pertanyaanInput.addEventListener('input', function() {
                const count = this.value.length;
                pertanyaanCounter.textContent = `${count}/255 karakter`;
                pertanyaanCounter.className = `text-muted mt-1 d-block ${count > 255 ? 'text-danger' : ''}`;
            });
        });


    </script>

    {{-- <!-- SweetAlert2 untuk alert yang lebih baik -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    <style>
        .is-invalid {
            border-color: #dc3545 !important;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }

        .invalid-feedback {
            display: block;
            font-size: 0.875em;
        }

        .form-label .text-danger {
            color: #dc3545 !important;
        }

        .alert ul {
            margin-bottom: 0;
        }

        .alert li {
            margin-bottom: 5px;
        }

        .card {
            border: 1px solid #e9ecef;
            border-radius: 0.75rem;
        }

        .card-title {
            font-weight: 600;
        }

        .btn-warning {
            background: linear-gradient(135deg, #f39c12, #e67e22);
            border: none;
            border-radius: 0.5rem;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            color: white;
        }

        .btn-warning:hover {
            background: linear-gradient(135deg, #e67e22, #d35400);
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(230, 126, 34, 0.3);
            color: white;
        }

        .form-control, .form-select {
            border-radius: 0.5rem;
            border: 1px solid #dee2e6;
            padding: 0.75rem 1rem;
            transition: all 0.2s ease-in-out;
        }

        .form-control:focus, .form-select:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .text-muted {
            font-size: 0.8125rem;
        }
    </style>
@endsection
