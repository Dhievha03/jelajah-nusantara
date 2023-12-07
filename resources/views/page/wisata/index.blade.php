@extends('page._layouts.main')
@section('title', 'Wisata')

@section('header')
    <div class="bg-image" style="background-image: url('{{ asset('page/img/background.png') }}'); height: 80vh">
        <div class="mask">
            <div class="d-flex justify-content-center align-items-center h-100">
                <!-- Search Bar Container -->
                <div class="search-bar-container">
                    <form class="d-flex" action="{{ route('search') }}" method="GET">
                        <input name="keyword" class="form-control" type="search" placeholder="Cari Wisata..."
                            aria-label="Cari Wisata..." />
                        <button class="btn btn-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section id="trending">
        <h1 class="text-center my-5">Wisata</h1>
        <div class="container">
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
                                        <a href="{{ route('detail', ['id' => $card->id]) }}">Read
                                            More</a>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>
@endsection
