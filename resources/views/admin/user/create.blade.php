@extends('admin._layouts.main')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah User</h1>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ session()->get('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Content Row -->
        <div class="card p-4 mb-4 col-lg-12">
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{ session()->get('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data" class="row">
                @csrf
                <div class="col-md-3 mb-4">
                    <div class="card p-4">
                        <div class="col-md-12">
                            <div class="rounded-circle position-relative d-flex align-items-center justify-content-center"
                                style="width: 100%; height: 0; padding-bottom: 100%; overflow: hidden; border: 2px solid #A4A4A4">
                                <img id="profile-image" class="position-absolute w-100 h-100"
                                    src="{{ asset('storage/profile/') }}"
                                    onerror="this.src='{{ asset('user/img/user.png') }}';" style="top: 0"
                                    alt="Lingkaran dengan Background Image">
                            </div>
                            <label class="btn btn-primary w-100 mt-4"
                                onclick="document.getElementById('upload-photo').click()">Tambah Foto</label>
                            <input name="foto" type="file" id="upload-photo" class="d-none" accept="image/*" />
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card p-4">
                        <div class="row">
                            <div class="form-group col-md-6 mb-4">
                                <label>Nama</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="********">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Konfirmasi Password</label>
                                <input type="password" name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    placeholder="********">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary px-4">Save</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </div>
        <!-- /.container-fluid -->
    </div>
@endsection

@section('script')
    <script>
        document.getElementById('upload-photo').addEventListener('change', function() {
            var fileInput = this;
            var file = fileInput.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('profile-image').src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
