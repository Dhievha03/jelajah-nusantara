@extends('page._layouts.main')
@section('title', $provinsi->nama)

@section('header')
    <div class="header-container">
        <div class="bg-black-sh"></div>
        <div class="container">
            <div class="header-content-text">
                <p class="p-0 m-0" style="font-size: 36px">Wisata Sejarah di</p>
                <p style="font-size: 48px; color: rgb(250, 178, 43)">{{$provinsi->nama}}</p>
            </div>
        </div>
        <img class="w-100 h-100" style="object-fit: cover; object-position: center" src="{{ asset('storage/provinsi/' . $provinsi->foto) }}" alt="" srcset="">
    </div>
@endsection

@section('content')
  <section id="content" class="container mb-4">
    <div class="row g-4">
        @forelse ($wisata as $item)
        <div class="col-lg-3 col-md-4">
            <a href="{{ route('page.wisata.detail', [$item->id, Str::slug($item->nama_wisata)]) }}" style="color: black; text-decoration: none">
                <div class="card h-100">
                    <img src="{{ asset('storage/wisata/' . $item->foto) }}" class="card-img-top"
                        alt="Card Image" />
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $item->nama_wisata }}</h5>
                        <div class="px-2 text-white bg-app-secondary rounded d-inline-block" style="font-size: 14px">{{ $item->provinsi->nama }}</div>
                        <small class="d-block text-muted my-2"><i class="bi bi-person-fill"></i> {{ $item->user->name }}</small>
                        <small class="d-block text-muted my-2"><i class="bi bi-clock"></i> {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM Y') }}</small>
                        <p class="card-text">
                            {{ Str::limit(strip_tags($item->deskripsi), $limit = 70, $end = '...') }}
                            @if (strlen(strip_tags($item->deskripsi)) > 70)
                                <a href="{{ route('page.wisata.detail', [$item->id, Str::slug($item->nama_wisata)]) }}">Lihat Selengkapnya</a>
                            @endif
                        </p>
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

    <div class="d-flex justify-content-center my-4">
        {{ $wisata->links() }}
    </div>
    
  </section>
@endsection