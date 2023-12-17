@extends('page._layouts.main')
@section('title', $cards->nama_wisata)
@section('description', substr(strip_tags($cards->deskripsi), 0, 100) . '...')

@section('content')
    <div class="container">
        <div class="row mt-4 pt-4">
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="font-weight-bold">{{ $cards->nama_wisata }}</h5>
                                <p style="font-size: 14px">{{ $cards->user->name }} |
                                    {{ $cards->created_at->diffForHumans() }} </p>
                            </div>
                            @auth
                                @livewire('saved-button', ['wisataId' => $cards->id])
                            @endauth
                            
                        </div>

                        <hr class="pt-0 mt-0" />
                        <div class="d-flex justify-content-center mb-2">
                            <img class="img-wisata" src="{{ asset('storage/wisata/' . $cards->foto) }}" alt=""
                                srcset="" style="height: 400px; width: auto; max-width: 100%;" />
                        </div>
                        <div class="mt-4">
                            {!! $cards->deskripsi !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="pt-2 pb-2" style="overflow: hidden">
                            {{-- IFRAME --}}
                            {!! $cards->iframe !!}
                        </div>
                        <div>{{ $cards->alamat }}</div>
                        <a href="{{ $cards->url_maps }}" target="_blank" rel="noopener noreferrer">Lihat di maps</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
