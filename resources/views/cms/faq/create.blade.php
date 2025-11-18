@extends('upcube.central')
@section('datacontent')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Tambah {{ $submenu }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $menu }}</a></li>
                                <li class="breadcrumb-item active">Tambah {{ $submenu }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Alert Success -->
            @if(session('success'))
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
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title mb-4 text-primary">
                                <i class="fas fa-plus-circle"></i> Form Tambah FAQ
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
                            <!-- Tampilkan Error Validasi -->

                            <form action="{{ route('faq_web.store') }}" method="POST" id="faqForm">
                                @csrf
                                <div class="row g-3">

                                     <div class="col-md-3">
                                        <label for="nama_web" class="form-label">Pilih Website <span class="text-danger">*</span></label>
                                        <select name="nama_web" id="nama_web" class="form-control" required>
                                            <option value="">Pilih</option>
                                            @foreach ($website as $data )
                                                <option value="{{ $data->id }}" data-subweb="{{ $data->sub_web }}">{{ $data->nama_web }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Pertanyaan -->
                                    <div class="col-md-3">
                                        <label for="pertanyaan" class="form-label">
                                            Pertanyaan <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="pertanyaan" id="pertanyaan"
                                               class="form-control @error('pertanyaan') is-invalid @enderror"
                                               placeholder="Masukkan pertanyaan"
                                               value="{{ old('pertanyaan') }}"
                                               maxlength="255" required>
                                        @error('pertanyaan')
                                            <div class="invalid-feedback">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- Keterangan -->
                                    <div class="col-md-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <input type="text" name="keterangan" id="keterangan"
                                               class="form-control @error('keterangan') is-invalid @enderror"
                                               placeholder="Masukkan keterangan (opsional)"
                                               value="{{ old('keterangan') }}"
                                               maxlength="100">
                                        @error('keterangan')
                                            <div class="invalid-feedback">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-3">
                                        <label for="status1" class="form-label">
                                            Status <span class="text-danger">*</span>
                                        </label>
                                        <select name="status1" id="status1"
                                                class="form-select @error('status1') is-invalid @enderror" required>
                                            <option value=""> -- Pilih Status -- </option>
                                            <option value="aktif" {{ old('status1') == 'aktif' ? 'selected' : '' }}>
                                                Aktif
                                            </option>
                                            <option value="nonaktif" {{ old('status1') == 'nonaktif' ? 'selected' : '' }}>
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
                                                  placeholder="Masukkan jawaban FAQ">{{ old('jawaban') }}</textarea>
                                        @error('jawaban')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <small class="text-muted">Jawaban wajib diisi dan minimal 10 karakter</small>
                                    </div>
                                </div>

                                <!-- Tombol -->
                                <div class="mt-4 d-flex justify-content-end gap-2">
                                    <a href="{{ route('faq_web.index') }}" class="btn btn-light">
                                        <i class="fas fa-arrow-left me-1"></i> Batal
                                    </a>
                                    <button type="submit" class="btn btn-success" id="submitBtn">
                                        <i class="fas fa-save me-1"></i> Simpan
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
            menubar: false,
            plugins: 'advlist autolink lists link image charmap preview anchor pagebreak code',
            toolbar: 'undo redo | formatselect | bold italic backcolor | \
                      alignleft aligncenter alignright alignjustify | \
                      bullist numlist outdent indent | removeformat | help',
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            }
        });

        // Validasi Form sebelum submit
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('faqForm');
            const submitBtn = document.getElementById('submitBtn');

            form.addEventListener('submit', function(e) {
                // Validasi field required
                const pertanyaan = document.getElementById('pertanyaan').value.trim();
                const status1 = document.getElementById('status1').value;
                const jawaban = tinymce.get('elm1') ? tinymce.get('elm1').getContent().trim() : '';

                let isValid = true;
                let errorMessage = '';

                // Validasi Pertanyaan
                if (!pertanyaan) {
                    isValid = false;
                    errorMessage += '• Pertanyaan wajib diisi\n';
                    document.getElementById('pertanyaan').classList.add('is-invalid');
                } else {
                    document.getElementById('pertanyaan').classList.remove('is-invalid');
                }

                // Validasi Status
                if (!status1) {
                    isValid = false;
                    errorMessage += '• Status wajib dipilih\n';
                    document.getElementById('status1').classList.add('is-invalid');
                } else {
                    document.getElementById('status1').classList.remove('is-invalid');
                }

                // Validasi Jawaban
                if (!jawaban) {
                    isValid = false;
                    errorMessage += '• Jawaban wajib diisi\n';
                    document.querySelector('[name="jawaban"]').classList.add('is-invalid');
                } else if (jawaban.length < 10) {
                    isValid = false;
                    errorMessage += '• Jawaban minimal 10 karakter\n';
                    document.querySelector('[name="jawaban"]').classList.add('is-invalid');
                } else {
                    document.querySelector('[name="jawaban"]').classList.remove('is-invalid');
                }

                if (!isValid) {
                    e.preventDefault();

                    // Tampilkan alert dengan semua error
                    Swal.fire({
                        icon: 'error',
                        title: 'Form Belum Lengkap',
                        html: errorMessage.replace(/\n/g, '<br>'),
                        confirmButtonText: 'Mengerti',
                        confirmButtonColor: '#dc3545'
                    });

                    return false;
                }

                // Tampilkan loading
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Menyimpan...';
                submitBtn.disabled = true;
            });

            // Hapus error state saat user mulai mengetik
            document.getElementById('pertanyaan').addEventListener('input', function() {
                this.classList.remove('is-invalid');
            });

            document.getElementById('status1').addEventListener('change', function() {
                this.classList.remove('is-invalid');
            });

            document.getElementById('keterangan').addEventListener('input', function() {
                this.classList.remove('is-invalid');
            });
        });
    </script>

    <!-- SweetAlert2 untuk alert yang lebih baik -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .is-invalid {
            border-color: #dc3545 !important;
        }

        .invalid-feedback {
            display: block;
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
    </style>
@endsection
