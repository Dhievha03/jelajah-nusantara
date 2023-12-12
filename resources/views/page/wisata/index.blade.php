@extends('page._layouts.main')
@section('title', 'Wisata')

@section('header')
    <div class="header-container">
        <div class="bg-black-sh"></div>
        @livewire('searchbox-wisata', ['keyword' => $keyword])
        <img class="w-100 h-100" style="object-fit: cover; object-position: center" src="{{ asset('page/img/background-3.png') }}" alt="" srcset="">
    </div>
@endsection

@section('content')
<section class="container" id="content">
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
            
        @endforelse
    </div>

    <div class="d-flex justify-content-center my-4">
        {{ $wisata->appends(request()->query())->links() }}
    </div>
</section>
@endsection
