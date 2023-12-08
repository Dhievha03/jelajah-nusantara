@extends('page._layouts.main')
@section('title', 'Wisata')

@section('header')
    <div class="header-container">
        <div class="bg-black-sh"></div>
        <livewire:searchbox-wisata />
        <img class="w-100 h-100" style="object-fit: cover; object-position: center" src="{{ asset('page/img/background-3.png') }}" alt="" srcset="">
    </div>
@endsection

@section('content')
<section class="container" id="content">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($cards as $card)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('storage/wisata/' . $card->foto) }}" class="card-img-top" alt="Card Image" />
                    <div class="card-body">
                        <h5 class="card-title">{{ $card['nama_wisata'] }}</h5>
                        <p class="card-text">
                            {{ Str::limit(strip_tags($card->deskripsi), $limit = 100, $end = '...') }}
                            @if (strlen(strip_tags($card->deskripsi)) > 100)
                                <a href="{{ route('page.wisata.detail', [$card->id, Str::slug($card->nama_wisata)]) }}">Read
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
