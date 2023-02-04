<x-layouts.dashboard title="Tambah">
  <x-slot:body>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Nomor Telepon</h6>
      </div>
      <div class="card-body">
        <form action="{{ route('telepon.store') }}" method="post" class="col-md-4">
          @csrf
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" id="nama" name="nama">
            @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="nomor">Nomor Telepon</label>
            <input type="text" class="form-control @error('nomor') is-invalid @enderror" value="{{ old('nomor') }}" id="nomor" name="nomor" placeholder="08x">
            @error('nomor')
              <div class="invalid-feedback">
                {{ $message  }}
              </div>
            @enderror
          </div>
          <button class="btn btn-success my-3">Simpan</button>
        </form>
      </div>
    </div>

  </x-slot>
</x-layouts>
