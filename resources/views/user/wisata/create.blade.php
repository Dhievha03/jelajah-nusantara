@extends('user._layouts.dashboard')



@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

 <!-- Page Heading -->
 <div class="card p-4 mb-4">
    <h5 class="font-weight-bold p-0 m-0">Tambah Wisata</h5>
 </div>

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
    <form action="{{ route('user.wisata.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="form-group col-md-6 mb-2">
            <label>Nama Tempat Wisata</label>
            <input type="text" class="form-control @error('nama_wisata') is-invalid @enderror" name="nama_wisata" value="{{ old('nama_wisata') }}" placeholder="Nama tempat wisata">
            @error('nama_wisata')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group col-md-6 mb-2">
            <label>URL Google Maps</label>
            <input type="text" class="form-control @error('url_maps') is-invalid @enderror" name="url_maps" value="{{ old('url_maps') }}" placeholder="https://maps.app.goo.gl/xxxxx">
            
            <div class="d-flex justify-content-end mt-1" title="Bagaimana cara saya mendapatkan URL Google Maps">
                <a href="#" data-toggle="modal" data-target="#urlMaps" style="text-decoration: none; width: 30px; height: 30px" class="d-flex justify-content-center bg-white rounded-circle border align-items-center">
                    <i class="fas fa-question"></i>
                </a>
            </div>
            
            @error('url_maps')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
      
        <div class="form-group col-md-6 mb-2">
            <label>Provinsi</label>
            <select name="provinsi" id="" class="form-control @error('provinsi') is-invalid @enderror">
                <option value="" disabled selected>-- Pilih Provinsi --</option>
                @foreach ($provinsi as $item)
                    <option value="{{ $item->id }}" {{ old('provinsi') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                @endforeach
            </select>
            @error('provinsi')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group col-md-6 mb-2">
          <label>Foto</label>
          <input type="file" class="form-control @error('foto') is-invalid @enderror form-control-file" id="imageInput" onchange="previewImage()" name="foto" value="{{ old('foto') }}" accept=".jpg, .jpeg, .png, .gif">
          <img id="imagePreview" src="#" alt="Preview" class="mt-2" style="display:none; max-width: 300px;">
          <small class="text-danger">Ukuran gambar maksimal 2MB</small>
          @error('foto')
              <div class="invalid-feedback">{{$message}}</div>
          @enderror
        </div>

        <div class="form-group col-md-6 mb-2">
            <label>Alamat</label>
            <textarea name="alamat" id="" cols="30" rows="5" class="form-control @error('alamat') is-invalid @enderror" name="alamat">{{ old('alamat') }}</textarea>
            @error('alamat')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group col-md-6 mb-2">
            <label>Iframe</label>
            <textarea name="iframe" id="" cols="30" rows="5" class="form-control @error('iframe') is-invalid @enderror" name="iframe">{{ old('iframe') }}</textarea>
            <div class="d-flex justify-content-end mt-1" title="Bagaimana cara saya mendapatkan Iframe">
                <a href="http://" style="text-decoration: none; width: 44px; height: 44px" class="d-flex justify-content-center bg-white rounded-circle border align-items-center">
                    <i class="fas fa-question"></i>
                </a>
            </div>
            @error('iframe')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group col-md-12 mb-4">
          <label>Deskripsi</label>
          <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi">{{ old('deskripsi') }}</textarea>
           @error('deskripsi')
              <div class="invalid-feedback">{{$message}}</div>
          @enderror
        </div>

        <div class="col-12 row justify-content-end">
          <button type="submit" class="btn btn-primary px-4">Simpan</button>
        </div>
    </div>
    </form>
  </div>

  <div class="modal fade" id="urlMaps" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
<!-- /.container-fluid -->
@endsection

@section('script')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('deskripsi', {
        toolbar: [
            ['Styles', 'Format', 'Font', 'FontSize'],
            ['Bold', 'Italic', 'Underline', 'Strike'],
            ['TextColor', 'BGColor'],
            ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'],
            ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
            ['Link', 'Unlink'],
            ['Undo', 'Redo'],
            ['Maximize'],
            '/',
        ]
    });
</script>

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
@endsection