@extends('page._layouts.main')
@section('title', 'Home')

@section('header')
    <div class="header-container">
        <div class="bg-black-sh"></div>
        <div class="container">
            <div class="header-content-text">
                <p class="p-0 m-0" style="font-size: 36px">Selamat Datang di</p>
                <p class="text-app-secondary" style="font-size: 48px;">Jelajah Nusantara</p>
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
        <h2 class="text-center my-5">Wisata Terbaru</h2>
        <div class="container">
            <div class="row g-4">
                @forelse ($wisata as $item)
                <div class="col-md-4">
                    <a href="{{ route('page.wisata.detail', [$item->id, Str::slug($item->nama_wisata)]) }}" style="color: black; text-decoration: none">
                        <div class="card h-100">
                            <img src="{{ asset('storage/wisata/' . $item->foto) }}" class="card-img-top"
                                alt="Card Image" />
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $item->nama_wisata }}</h5>
                                <div class="px-2 py-1 text-white bg-app-secondary rounded d-inline-block">{{ $item->provinsi->nama }}</div>
                                <small class="d-block text-muted my-2"><i class="bi bi-person-fill"></i> {{ $item->user->name }}</small>
                                <small class="d-block text-muted my-2"><i class="bi bi-clock"></i> {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM Y') }}</small>
                                <p class="card-text">
                                    {{ Str::limit(strip_tags($item->deskripsi), $limit = 100, $end = '...') }}
                                    @if (strlen(strip_tags($item->deskripsi)) > 100)
                                        <a href="{{ route('page.wisata.detail', [$item->id, Str::slug($item->nama_wisata)]) }}">Lihat Selengkapnya</a>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                    
                @endforelse
            </div>
        </div>
    </section>
@endsection
