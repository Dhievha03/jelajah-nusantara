@extends('page._layouts.main')
@section('title', 'Home')

@section('header')
    <div class="header-container">
        <div class="bg-black-sh"></div>
        <div class="container">
            <div class="header-content-text">
                <p class="p-0 m-0" style="font-size: 36px">Selamat Datang di</p>
                <p style="font-size: 48px; color: rgb(250, 178, 43)">Jelajah Nusantara</p>
            </div>
        </div>
        <img class="w-100 h-100" style="object-fit: cover; object-position: center" src="{{ asset('page/img/background-3.png') }}" alt="" srcset="">
    </div>
@endsection

@section('content')
    <div class="container">
        <section>
            <div class="row">
                <div class="col-md-6 gx-5 mb-2">
                    <div class="bg-image rounded-5">
                        <img src="https://mdbootstrap.com/img/new/slides/031.jpg" class="img-fluid" />
                    </div>
                </div>

                <div class="col-md-6 gx-5 mb-2">
                    <h4><strong>Facilis consequatur eligendi</strong></h4>
                    <p class="text-muted">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis
                        consequatur eligendi quisquam doloremque vero ex debitis
                        veritatis placeat unde animi laborum sapiente illo possimus,
                        commodi dignissimos obcaecati illum maiores corporis.
                    </p>
                    <p><strong>Doloremque vero ex debitis veritatis?</strong></p>
                    <p class="text-muted">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod
                        itaque voluptate nesciunt laborum incidunt. Officia, quam
                        consectetur. Earum eligendi aliquam illum alias, unde optio
                        accusantium soluta, iusto molestiae adipisci et?
                    </p>
                </div>
            </div>
        </section>
    </div>

    <section id="trending">
        <h1 class="text-center my-5">Trending</h1>
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @for ($i = 0; $i < 3; $i++)
                    @if (isset($cards[$i]))
                        @php
                            $card = $cards[$i];
                        @endphp
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{ asset('storage/wisata/' . $card->foto) }}" class="card-img-top"
                                    alt="Card Image" />
                                <div class="card-body">
                                    <h5 class="card-title">{{ $card->nama_wisata }}</h5>
                                    <p class="card-text">
                                        {{ Str::limit(strip_tags($card->deskripsi), $limit = 100, $end = '...') }}
                                        @if (strlen(strip_tags($card->deskripsi)) > 100)
                                            <a href="{{ route('page.wisata.detail', [$card->id, Str::slug($card->nama_wisata)]) }}">Read More</a>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>
        </div>
    </section>
@endsection
