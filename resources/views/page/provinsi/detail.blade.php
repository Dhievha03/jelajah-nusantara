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
        <img class="w-100 h-100" style="object-fit: cover; object-position: center" src="{{ asset('page/img/background-3.png') }}" alt="" srcset="">
    </div>
@endsection

@section('content')
  <section id="content" class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($wisata as $item)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('storage/wisata/' . $item->foto) }}" class="card-img-top" alt="Card Image" />
                    <div class="card-body">
                        <h5 class="card-title">{{ $item['nama_wisata'] }}</h5>
                        <p class="card-text">
                            {{ Str::limit(strip_tags($item->deskripsi), $limit = 100, $end = '...') }}
                            @if (strlen(strip_tags($item->deskripsi)) > 100)
                                <a href="{{ route('detail', ['id' => $item->id]) }}">Read
                                    More</a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
  </section>
@endsection