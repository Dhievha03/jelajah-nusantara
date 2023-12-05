@extends('admin._layouts.main')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Provinsi</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-4">
                <div class="card p-4 mb-4">
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
                    <!-- Formulir Create -->
                    <form action="{{ route('admin.provinsi.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Buat Provinsi:</label>
                            <input type="text" class="form-control" name="nama" required placeholder="Nama provinsi">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
            <div class="col-8">
                <div class="card p-4 mb-4">
                    <table class="table table-bordered mt-4">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Provinsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($provinsis as $provinsi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $provinsi->nama }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <div class="mr-2">
                                                <button type="button" class="btn btn-info btn-icon-split"
                                                    data-toggle="modal" data-target="#editModal{{ $provinsi->id }}">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-info-circle"></i>
                                                    </span>
                                                    <span class="text">Edit</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('admin.provinsi.delete', $provinsi->id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-icon-split"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus Provinsi {{ $provinsi->nama }}?')">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">Delete</span>
                                                </button>
                                            </form>
                                        </div>
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal{{ $provinsi->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="editModalLabel{{ $provinsi->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel{{ $provinsi->id }}">Edit
                                                            Provinsi</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ route('admin.provinsi.update', ['id' => $provinsi->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="nama">Update Provinsi:</label>
                                                                <input type="text" class="form-control" name="nama"
                                                                    value="{{ $provinsi->nama }}" required>
                                                            </div>
                                                            <button type="submit" class="btn btn-success">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Edit -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $provinsis->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
