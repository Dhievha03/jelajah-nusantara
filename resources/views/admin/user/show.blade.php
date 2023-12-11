@extends('admin._layouts.main')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card p-4 mb-4">
            <h4 class="font-weight-bold p-0 m-0">Detail User</h4>
        </div>

        <!-- Content Row -->
        <div class="card p-4 mb-4 col-lg-12">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card p-4">
                        <div class="col-md-12">
                            <div class="rounded-circle position-relative d-flex align-items-center justify-content-center"
                                style="width: 100%; height: 0; padding-bottom: 100%; overflow: hidden; border: 2px solid #A4A4A4">
                                @if ($user->foto)
                                    <img id="profile-image" class="position-absolute w-100 h-100"
                                        src="{{ asset('storage/profile/' . $user->foto) }}"
                                        onerror="this.src='{{ asset('user/img/user.png') }}';" style="top: 0"
                                        alt="Lingkaran dengan Background Image">
                                @else
                                    <img id="profile-image" class="position-absolute w-100 h-100"
                                        src="{{ asset('user/img/user.png') }}" style="top: 0"
                                        alt="Lingkaran dengan Background Image">
                                @endif
                            </div>
                            <figcaption class="mt-2" style="text-align: center;">User Image</figcaption>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card p-4">
                        <!-- Konten di dalam card kedua -->
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <span id="passwordPlaceholder" data-password="{{ $user->password }}">
                                                    {{ str_repeat('*', 8) }}
                                                </span>
                                            </td>
                                            <td class="d-flex">
                                                <div class="d-flex justify-content-end">
                                                    <a href="{{ route('admin.user.edit', $user->id) }}"
                                                        class="btn btn-m btn-warning m-1">Edit</a>
                                                    <form action="{{ route('admin.user.destroy', $user->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-m btn-icon btn-danger m-1"
                                                            onclick="return confirm('Anda yakin?')">Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
