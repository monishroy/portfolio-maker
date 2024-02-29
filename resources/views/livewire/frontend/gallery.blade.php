
<div>
    <form wire:submit="store">
        <div class="row">
            <div class="col-md-6">
                <div class="w-100">
                    <input class="form-control d-none" wire:model="photo" name="image" type="file" id="image-input" required>
                    <label for="image-input" class="p-5 rounded border border-2 border-dashed cursor-pointer w-100" style="">
                        <div class="mb-3 text-center">
                            <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                        </div>
                        <h5 class="text-center">Drop files here or click to upload.</h5>
                    </label>
                    @error('photo')<small class="text-danger form-text">{{$message}}</small>@enderror
                </div>
                {{-- <input type="file" wire:model="photo" class="from-control"> --}}
                <span wire:loading  wire:target="photo">Uploading...</span>
            </div>
            <div class="col-md-6">
                @if ($photo) 
                <img src="{{ $photo->temporaryUrl() }}" class="img-fluid" style="height: 210px">
                @else
                @if(Auth::user()->image != null)
                <img src="{{ asset("storage/users/".Auth::user()->id.'/'.Auth::user()->image) }}" class="img-fluid" style="height: 210px">
                @endif
                @endif
            </div>
        </div>
    
    
        @error('photo') <span class="error">{{ $message }}</span> @enderror
    
        <button class="btn btn-sm btn-primary" type="submit">
            @if(Auth::user()->image != null)
            <span wire:loading wire:target="photo">Uploading...</span>
            <span wire:loading.remove wire:target="photo">Change Photo</span>
            @else
            Save Photo
            @endif
        </button>
    </form>
</div>