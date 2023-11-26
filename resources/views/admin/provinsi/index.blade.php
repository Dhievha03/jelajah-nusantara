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
            <div class="col">
                <div class="card p-4 mb-4">
                    <!-- Formulir Create -->
                    <form action="/store" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Create Provinsi:</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
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
                                            @if (isset($provinsi))
                                                <form action="{{ route('update', $provinsi->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="nama">Update Provinsi:</label>
                                                        <input type="text" name="nama" value="{{ $provinsi->nama }}"
                                                            required>
                                                        <button type="submit" class="btn btn-info btn-icon-split"
                                                            style="margin-right: 5px;">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-info-circle"></i>
                                                            </span>
                                                            <span class="text">Edit</span>
                                                        </button>
                                                    </div>
                                                </form>
                                            @endif
                                            <form action="{{ route('destroy', $provinsi->id) }}" method="POST"
                                                style="display: inline;">
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
