<div class="position-absolute w-50 top-50 start-50 translate-middle">
    <form class="d-flex" action="{{ route('page.wisata.search') }}" method="GET" class="d-flex px-4 py-3">
        <input name="keyword" class="form-control" type="search" placeholder="Cari Wisata..."
            aria-label="Cari Wisata..." / wire:model='search' wire:keyup='searchResult'>
        <button class="btn btn-light" type="submit">Search</button>
    </form>
    @if ($show)
    <ul class="p-2 border w-100" style="background-color: white; list-style-type: none; padding: 0; margin: 0; position: absolute;">
        @foreach ($result as $item)
            <li><a class="text-secondary" href="{{ route('page.wisata.detail', [$item->id, Str::slug($item->nama_wisata)]) }}" style="text-decoration: none;">{!! $item->search_nama !!}</a></li>
        @endforeach
    </ul>
    @endif
</div>
