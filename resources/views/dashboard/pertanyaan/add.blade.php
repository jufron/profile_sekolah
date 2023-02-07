<x-layouts.dashboard title="Tambah">
  <x-slot:body>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Pertanyaan</h6>
      </div>
      <div class="card-body">
        <form action="{{ route('pertanyaan.store') }}" method="post">
          @csrf
          <div class="form-group col-md-5">
            <label for="pertanyaan">Pertanyaan</label>
            <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror" value="{{ old('pertanyaan') }}" id="pertanyaan" name="pertanyaan">
            @error('pertanyaan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group col-md-8">
            <label for="jawaban">Jawaban</label>
            <textarea class="form-control @error('jawaban') is-invalid @enderror" id="jawaban" name="jawaban" rows="6" placeholder="Tulis jawaban disini">{{ old('jawaban') }}</textarea>
            @error('jawaban')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <button class="btn btn-success my-3">Simpan</button>
        </form>
      </div>
    </div>

  </x-slot>
</x-layouts>