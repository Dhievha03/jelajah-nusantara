@extends('admin._layouts.main')

@section('css')
<link rel="stylesheet" href="{{ asset('template-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
     <!-- Begin Page Content -->
<div class="container-fluid">

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Detail Wisata</h1>
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
                <img src="{{ asset('storage/wisata/' . $wisata->foto) }}" alt="" srcset="" style="height: 400px; width: auto">
              </div>
              <div class="mt-4">
                {!! $wisata->deskripsi !!}
              </div>
          </div>
      </div>
  </div>

  <!-- Pie Chart -->
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