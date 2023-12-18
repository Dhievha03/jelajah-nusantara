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
                <a href="#" data-toggle="modal" data-target="#urlMaps" style="text-decoration: none; width: 20px; height: 20px" class="d-flex justify-content-center bg-white rounded-circle border align-items-center p-3">
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
                <a href="#" data-toggle="modal" data-target="#iframe" style="text-decoration: none; width: 20px; height: 20px" class="d-flex justify-content-center bg-white rounded-circle border align-items-center p-3">
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


  {{-- modal --}}
  <div class="modal fade" id="urlMaps" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="exampleModalLabel" style="color: rgb(106, 106, 106)">Panduan cara mendapatkan URL Google Maps</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ol>
            <li class="mb-4">Kunjungi Google Maps pada Browser Anda.
              <img class="w-100" src="{{ asset('tutorial/step_1.png') }}" alt="step_1">
            </li>
            <li class="mb-4">Cari lokasi atau alamat yang ingin Anda tampilkan di peta. Kilk lokasi atau alamat tersebut maka akan muncul menu “Ringkasan”.
              <img class="w-100" src="{{ asset('tutorial/step_2.png') }}" alt="step_2">
            </li>
            <li class="mb-4">Pilih opsi “Bagikan” atau “Share”.
              <img class="w-100" src="{{ asset('tutorial/step_3.png') }}" alt="step_3">
            </li>
            <li class="mb-4">Pilih “Salin Link” pada halaman “Kirim link” tuk menyalin URL peta yang diinginkan.
              <img class="w-100" src="{{ asset('tutorial/step_4.png') }}" alt="step_4">
            </li>
          </ol>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="iframe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="exampleModalLabel" style="color: rgb(106, 106, 106)">Panduan cara mendapatkan Iframe</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ol>
            <li class="mb-4">Kunjungi Google Maps pada Browser Anda.
              <img class="w-100" src="{{ asset('tutorial/step_1.png') }}" alt="step_1">
            </li>
            <li class="mb-4">Cari lokasi atau alamat yang ingin Anda tampilkan di peta. Kilk lokasi atau alamat tersebut maka akan muncul menu “Ringkasan”.
              <img class="w-100" src="{{ asset('tutorial/step_2.png') }}" alt="step_2">
            </li>
            <li class="mb-4">Pilih opsi “Bagikan” atau “Share”.
              <img class="w-100" src="{{ asset('tutorial/step_3.png') }}" alt="step_3">
            </li>
            <li class="mb-4">Klik “Sematkan peta” kemudian pilih ukuran “Kecil” di sebelah link iframe.
              <img class="w-100" src="{{ asset('tutorial/step_4.1.png') }}" alt="step_4">
            </li>
            <li class="mb-4">Pilih “Salin HTML” untuk menyalin html iframe.
              <img class="w-100" src="{{ asset('tutorial/step_4.2.png') }}" alt="step_4">
            </li>
          </ol>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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