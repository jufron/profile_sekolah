<x-layouts.dashboard title="Ubah">
  <x-slot:body>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Social Media</h6>
      </div>
      <div class="card-body">
         <form action="{{ route('social_media.update', $socialMediaLink) }}" method="post">
          @method('patch')
          @csrf
          <div class="form-group col-md-4">
            <label for="social_media">Social Media</label>
            <select class="custom-select @error('social_media_id') is-invalid @enderror" id="social_media" name="social_media_id">
              @foreach ($social_media as $sosmed)
                <option value="{{ $sosmed->id }}" @if ($sosmed->id == $socialMediaLink->social_media_id) selected @endif> {{ $sosmed->nama }} </option>
              @endforeach
            </select>
            @error('social_media_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="link">Link Social Media</label>
            <input type="text" class="form-control @error('link') is-invalid @enderror" value="{{ old('link', $socialMediaLink->link) }}" id="link" name="link">
            @error('link')
              <div class="invalid-feedback">
                {{ $message  }}
              </div>
            @enderror
          </div>

          <button class="btn btn-success my-3">Perbaharui</button>
        </form>
      </div>
    </div>
  </x-slot>
</x-layouts>
