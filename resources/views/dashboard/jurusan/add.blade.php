<x-layouts.dashboard title="Tambah">
  <x-slot:body>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Jurusan</h6>
      </div>
      <div class="card-body">
        <form
          action="{{ route('jurusan.store') }}"
          method="post"
          enctype="multipart/form-data"
          >
          @csrf

          <div class="col-md-4">
            <img id="preview_img" style="width: 300px height: 200px" src="" class="img-responsive img-thumbnail img-rounded bg-light block mt-3" alt="banner">
          </div>

          <div class="form-group my-2">
            <label for="poster">Poster</label>
            <input type="file" class="form-control-file" id="poster" name="poster">
            @error('poster')
              <div class="alert alert-danger mt-2 col-md-4" role="alert">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group col-md-5 mt-4">
            <label for="nama">Nama Jurusan</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" id="nama" name="nama">
            @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="row">
            <div class="form-group col-md-2">
              <label for="singkatan">Singkatan</label>
              <input type="text" class="form-control @error('singkatan') is-invalid @enderror" value="{{ old('singkatan') }}" id="singkatan" name="singkatan">
              @error('singkatan')
                <div class="invalid-feedback">
                  {{ $message  }}
                </div>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label for="terjemahan">Terjemahan</label>
              <input type="text" class="form-control @error('terjemahan') is-invalid @enderror" value="{{ old('terjemahan') }}" id="terjemahan" name="terjemahan">
              @error('terjemahan')
                <div class="invalid-feedback">
                  {{ $message  }}
                </div>
              @enderror
            </div>
          </div>

          <div class="form-group col-md-8">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="5" placeholder="Tulis deskripsi disini">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
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
  <x-slot:script>
    <script>
      const preview_img = document.getElementById('preview_img');
      const poster = document.getElementById('poster');

      poster.addEventListener('change', function (e) {
        preview_img.src = URL.createObjectURL(e.target.files[0]);

        poster.addEventListener('load', function () {
          URL.revokeObjectURL(poster.src) // free memory
        });

      });

    </script>
  </x-slot>
</x-layouts>
