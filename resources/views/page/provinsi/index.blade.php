@extends('page._layouts.main')
@section('title', 'Trending')

@section('header')
<div class="header-container">
    <div class="bg-black-sh"></div>
    <div class="container">
        <div class="header-content-text">
            <p class="p-0 m-0" style="font-size: 36px">Cari Wisata </p>
            <p class="text-app-secondary" style="font-size: 48px;">di Daerahmu</p>
        </div>
    </div>
    <img class="w-100 h-100" style="object-fit: cover; object-position: center" src="{{ asset('page/img/background-3.png') }}" alt="" srcset="">
</div>
@endsection

@section('content')
  <section id="content" class="container mb-4">
    <div class="row g-4">
        @forelse ($provinsi as $item)
        <div class="col-xl-3 col-md-4">
            <a href="{{ route('page.provinsi.detail', [$item->id, Str::slug($item->nama)]) }}" style="color: black; text-decoration: none">
                <div class="card h-100">
                    <img src="{{ asset('storage/provinsi/' . $item->foto) }}" class="card-img-top"
                        alt="Card Image" />
                    <div class="card-body pb-0">
                        <h5 class="card-title fw-bold p-0 m-0" style="color: black;">{{ $item->nama }}</h5>
                    </div>
                </div>
            </a>
        </div>
        @empty
        <div class="text-center">
            Belum ada data tersedia
        </div>
        @endforelse
    </div>
  </section>
@endsection
