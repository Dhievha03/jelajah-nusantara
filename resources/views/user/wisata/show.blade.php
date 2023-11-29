@extends('user._layouts.dashboard')

@section('content')
     <!-- Begin Page Content -->
<div class="container-fluid">

 <!-- Page Heading -->
  <div class="card p-4 mb-4">
    <h5 class="font-weight-bold p-0 m-0">Detail Wisata</h5>
  </div>

 <!-- Content Row -->
 <div class="row">
  <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
          <div class="card-body">
              <h5 class="font-weight-bold">{{ $wisata->nama_wisata }}</h5>
              <p>{{ $wisata->user->name }} | {{ $wisata->created_at->diffForHumans() }} </p>
              <hr>
              <div class="d-flex justify-content-center mb-2">
                <img src="{{ asset('storage/wisata/' . $wisata->foto) }}" alt="" srcset="" style="height: 400px; width: auto; max-width: 100%;">
              </div>
              <div class="mt-4">
                {!! $wisata->deskripsi !!}
              </div>
          </div>
      </div>
  </div>

  <div class="col-xl-4 col-lg-5">
      <div class="card shadow mb-4">
          <div class="card-body">
              <div class="pt-2 pb-2" style="overflow: hidden">
                {{-- IFRAME --}}
                {!! $wisata->iframe !!}
              </div>
              <div>{{ $wisata->alamat }}</div>
              <a href="{{ $wisata->url_maps }}" target="_blank" rel="noopener noreferrer">Lihat di maps</a>
          </div>
      </div>
  </div>
  </div>
</div>
<!-- /.container-fluid -->
@endsection