<div class="position-absolute w-50 top-50 start-50 translate-middle">
    <input type="text" class="form-control w-100 px-4 py-3" placeholder="Cari Provinsi" wire:model='search' wire:keyup='searchResult'>
    @if ($show)
    <ul class="p-2 border w-100" style="background-color: white; list-style-type: none; padding: 0; margin: 0; position: absolute;">
        @foreach ($result as $item)
            <li><a class="text-secondary" href="{{ route('page.provinsi.detail', [$item->id, Str::slug($item->nama)]) }}" style="text-decoration: none;">{!! $item->search_nama !!}</a></li>
        @endforeach
    </ul>
    @endif
</div>
