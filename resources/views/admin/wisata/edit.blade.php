@extends('admin._layouts.main')



@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Edit Wisata</h1>
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
    <form action="{{ route('admin.wisata.update', $wisata->id) }}" method="POST" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="row">
        <div class="form-group col-md-6 mb-4">
            <label>Nama Tempat Wisata</label>
            <input type="text" class="form-control @error('nama_wisata') is-invalid @enderror" name="nama_wisata" value="{{ old('nama_wisata', $wisata->nama_wisata) }}">
            @error('nama_wisata')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group col-md-6 mb-4">
            <label>URL Google Maps</label>
            <input type="text" class="form-control @error('url_maps') is-invalid @enderror" name="url_maps" value="{{ old('url_maps', $wisata->url_maps) }}">
            @error('url_maps')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group col-md-6 mb-4">
          <label>Status</label>
          <select name="status" id="" class="form-control @error('status') is-invalid @enderror">
              <option value="" disabled selected>-- Pilih Status --</option>
              <option value="1" {{ old('status', $wisata->status) == '1' ? 'selected' : '' }}>Diterima</option>
              <option value="2" {{ old('status', $wisata->status) == '2' ? 'selected' : '' }}>Ditolak</option>
              <option value="3" {{ old('status', $wisata->status) == '3' ? 'selected' : '' }}>Menunggu</option>
          </select>
          @error('status')
              <div class="invalid-feedback">{{$message}}</div>
          @enderror
        </div>
      
        <div class="form-group col-md-6 mb-4">
            <label>Provinsi</label>
            <select name="provinsi" id="" class="form-control @error('provinsi') is-invalid @enderror">
                <option value="" disabled selected>-- Pilih Provinsi --</option>
                @foreach ($provinsi as $item)
                    <option value="{{ $item->id }}" {{ old('provinsi', $wisata->prov_id) == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                @endforeach
            </select>
            @error('provinsi')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group col-md-6 mb-4">
            <label>Alamat</label>
            <textarea name="alamat" id="" cols="30" rows="5" class="form-control @error('alamat') is-invalid @enderror" name="alamat">{{ old('alamat', $wisata->alamat) }}</textarea>
            @error('alamat')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group col-md-6 mb-4">
            <label>Iframe</label>
            <textarea name="iframe" id="" cols="30" rows="5" class="form-control @error('iframe') is-invalid @enderror" name="iframe">{{ old('iframe', $wisata->iframe) }}</textarea>
            @error('iframe')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group col-md-6 mb-4">
          <img id="imagePreview" src="#" alt="Preview" class="mb-2" style="display:none;width: 100%">
          <img id="imageOld" src="{{ asset('storage/wisata/' . $wisata->foto) }}" alt="Preview" class="mb-2" style="display: block;width: 100%">
          <label>Foto</label>
          <input type="file" class="form-control @error('foto') is-invalid @enderror form-control-file" id="imageInput" onchange="previewImage()" name="foto" value="{{ old('foto') }}">
          <small class="text-danger">Abaikan jika tidak ingin mengubah foto</small>
          @error('foto')
              <div class="invalid-feedback">{{$message}}</div>
          @enderror
        </div>

        <div class="form-group col-md-12 mb-4">
          <label>Deskripsi</label>
          <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi">{{ old('deskripsi', $wisata->deskripsi) }}</textarea>
           @error('deskripsi')
              <div class="invalid-feedback">{{$message}}</div>
          @enderror
        </div>

        <div class="col-12 row justify-content-end">
          <button type="submit" class="btn btn-primary px-4">Update</button>
        </div>
    </div>
    </form>
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
@endsection