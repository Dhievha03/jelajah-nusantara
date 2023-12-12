@extends('user._layouts.dashboard')
@section('css')
<style>
  .text-app-primary{
      color: #0b2f8a
  }
  .text-app-secondary{
      color: rgb(250, 178, 43)
  }
  .bg-app-primary{
      background-color: #0b2f8a;
  }
  .bg-app-secondary{
      background-color: rgb(250, 178, 43)
  }
</style>
@endsection
@section('content')
     <!-- Begin Page Content -->
<div class="container-fluid">

 <!-- Page Heading -->
 <div class="card p-4 mb-4">
    <h5 class="font-weight-bold p-0 m-0">Wisata Tersimpan</h5>
 </div>

 <!-- Content Row -->
 <div class="row g-4">
  @forelse ($saved as $item)
  <div class="col-md-4">
      <a href="{{ route('page.wisata.detail', [$item->wisata->id, Str::slug($item->wisata->nama_wisata)]) }}" style="color: black; text-decoration: none">
          <div class="card h-100">
              <img src="{{ asset('storage/wisata/' . $item->wisata->foto) }}" class="card-img-top"
                  alt="Card Image" />
              <div class="card-body">
                  <h5 class="card-title font-weight-bold">{{ $item->wisata->nama_wisata }}</h5>
                  <div class="px-2 py-1 text-white bg-app-secondary rounded d-inline-block" style="font-size: 12px !important">{{ $item->wisata->provinsi->nama }}</div>
                  <small class="d-block text-muted my-2"><i class="bi bi-person-fill"></i> {{ $item->wisata->user->name }}</small>
                  <small class="d-block text-muted my-2"><i class="bi bi-clock"></i> {{ \Carbon\Carbon::parse($item->wisata->created_at)->isoFormat('D MMMM Y') }}</small>
                  <p class="card-text">
                      {{ Str::limit(strip_tags($item->wisata->deskripsi), $limit = 100, $end = '...') }}
                      @if (strlen(strip_tags($item->wisata->deskripsi)) > 100)
                          <a href="{{ route('page.wisata.detail', [$item->wisata->id, Str::slug($item->wisata->nama_wisata)]) }}">Lihat Selengkapnya</a>
                      @endif
                  </p>
              </div>
          </div>
      </a>
  </div>
  @empty
  <div class="container text-center">
    Data masih kosong silahkan kunjungi halaman <a href="{{ route('page.wisata') }}">wisata</a> untuk menambahkannya
  </div>
  @endforelse
</div>

</div>
<!-- /.container-fluid -->
@endsection