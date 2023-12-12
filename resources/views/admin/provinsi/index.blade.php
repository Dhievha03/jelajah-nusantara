@extends('admin._layouts.main')
@section('css')
<link rel="stylesheet" href="{{ asset('template-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Provinsi</h1>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible col-lg-12" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible col-lg-12" role="alert">
                {{ session()->get('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-4">
                <div class="card p-4 mb-4">
                    @if (Route::is('admin.provinsi.index'))
                    <form action="{{ route('admin.provinsi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="nama">Nama Provinsi</label>
                            <input type="text" class="form-control" name="nama" required placeholder="Nama provinsi">
                        </div>

                        <div class="form-group mb-4">
                            <img id="imagePreview" src="#" alt="Preview" class="mb-2" style="display:none; width: 100%">
                            <label>Foto</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror form-control-file" id="imageInput" onchange="previewImage()" name="foto" value="{{ old('foto') }}">
                            @error('foto')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    @elseif(Route::is('admin.provinsi.edit'))
                    <form action="{{ route('admin.provinsi.update', $provinsi->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group mb-4">
                            <label for="nama">Nama Provinsi</label>
                            <input type="text" class="form-control" name="nama" required placeholder="Nama provinsi" value="{{ $provinsi->nama }}">
                        </div>

                        <div class="form-group mb-4">
                            <img id="imageOld" src="{{ asset('storage/provinsi/' . $provinsi->foto) }}" alt="Image Provinsi" style="display:block; width: 100%">
                            <img id="imagePreview" src="#" alt="Preview" class="mb-2" style="display:none; width: 100%">
                            <label>Foto</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror form-control-file" id="imageInput" onchange="previewImage()" name="foto" value="{{ old('foto') }}">
                            <small class="text-danger">Abaikan jika tidak ingin mengubah foto</small>
                            @error('foto')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    @endif
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="card p-4 mb-4">
                    <div class="table-responsive mt-4">
                        <table class="table" id="data-table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Wisata</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

@section('script')
<script src="{{ asset('template-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
  var dataTable = $('#data-table').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      autoWidth: true,
      scrollX: true,
      ajax: "{{ route('admin.provinsi.getProvinsis') }}",
      columns: [
        {
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'nama',
            name: 'nama',
        },
        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        },
      ],
      language: {
          emptyTable: 'Tidak ada data dalam table',
          lengthMenu: 'Tampilkan _MENU_ entri',
          search: 'Pencarian:',
          info: 'Menampilkan _START_ hingga _END_ dari _TOTAL_ entri',
          infoEmpty: "Menampilkan 0 hingga 0 dari 0 entri",
          paginate: {
              previous: '<i class="bx bx-chevron-left"></i>',
              next: "<i class='bx bx-chevron-right'></i>",
          }
      },
  });
</script>

@if (Route::is('admin.provinsi.index'))
<script>
    function previewImage() {
        var input = document.getElementById('imageInput');
        var preview = document.getElementById('imagePreview');
  
        if (input.files && input.files[0]) {
            var reader = new FileReader();
  
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
  
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@elseif (Route::is('admin.provinsi.edit'))
<script>
    function previewImage() {
        let input = document.getElementById('imageInput');
        let preview = document.getElementById('imagePreview');
        let old = document.getElementById('imageOld');
  
        if (input.files && input.files[0]) {
            let reader = new FileReader();
  
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                old.style.display = 'none';
            };
  
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endif

@endsection
