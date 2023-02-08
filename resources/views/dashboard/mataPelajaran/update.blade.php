<x-layouts.dashboard title="Ubah">
    <x-slot:body>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Ubah Mata Pelajaran</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('mata-pelajaran.update', $mataPelajaran) }}" method="post" class="col-md-5">
            @method('patch')
            @csrf
            <div class="form-group">
              <label for="nama">Nama Mata Pelajaran</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $mataPelajaran->nama) }}" id="nama" name="nama">
              @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <button class="btn btn-success my-3">Perbaharui</button>
          </form>
        </div>
      </div>
    </x-slot>
</x-layouts>
