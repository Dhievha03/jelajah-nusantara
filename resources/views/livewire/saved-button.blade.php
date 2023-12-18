<div>
    <form wire:submit.prevent="saveItem">
        @csrf

        <input type="hidden" name="wisataId" wire:model="wisataId">
        
        <button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;">
            <div style="min-width: 44px; cursor: pointer; text-align: right">
                <i class="bi bi-bookmark-fill" style="font-size: 28px; color: {{ $isSaved ? '#0b2f8a' : '#a4a4a4' }}" title="Simpan Wisata"></i>
            </div>
        </button>
    </form>
</div>
