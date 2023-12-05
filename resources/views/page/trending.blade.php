@extends('page._layouts.main')
@section('title', 'Trending')

@section('header')
    <div class="bg-image" style="background-image: url('{{ asset('page/img/background.png') }}'); height: 80vh">
        <div class="mask">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="dropdown-left">
                    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Pilih Provinsi
                    </button>
                    <ul class="dropdown-menu dropdown-menu-start" style="max-height: 200px; overflow-y: auto;">
                        @foreach ($select as $item)
                            <li><a class="dropdown-item" href="{{ $item->id }}">{{ $item->nama }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section id="trending">
        <h1 class="text-center my-5">Trending</h1>
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
