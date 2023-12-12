<div class="container" style="z-index: 10">
    <div class="header-content-text wisata-search">
        <p class="p-0 m-0" style="font-size: 36px">Telusuri Tempat </p>
        <p class="text-app-secondary" style="font-size: 48px;">Wisata Sejarah</p>
        <form action="{{ route('page.wisata.search') }}" method="GET" class="row g-2 align-items-start">
            <div class="col-md-9">
                <input name="keyword" class="form-control py-2" type="text" placeholder="Cari Wisata..."
                    aria-label="Cari Wisata..." wire:model='keyword' wire:keyup='searchResult'>
            </div>
            <div class="col-md-3">
                <button class="text-white px-4 py-2 rounded-2 fw-bold bg-app-secondary w-100 shadow-sm border-0" type="submit"> Cari </button>
            </div>
        </form>
    
        @if ($show)
        <ul class="p-2 border w-100" style="background-color: white; list-style-type: none; padding: 0; margin: 0; position: absolute; max-height: 300px; overflow-y: scroll">
            @forelse ($result as $item)
                <li class="p-2"><a class="text-secondary" href="{{ route('page.wisata.detail', [$item->id, Str::slug($item->nama_wisata)]) }}" style="text-decoration: none;">{!! $item->search_nama !!}</a></li>
            @empty
            <li class="p-2 text-center text-secondary">Wisata Tidak ditemukan</li>
            @endforelse
        </ul>
        @endif
        
    </div>
</div>

