<x-layouts.dashboard title="Tambah">
  <x-slot:body>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Testimoni</h6>
      </div>
      <div class="card-body">
        <form
          action="{{ route('testimoni.store') }}"
          method="post"
          enctype="multipart/form-data"
          >
          @csrf

          <div class="col-md-4">
            <img id="preview_img" style="width: 300px height: 200px" src="" class="img-responsive img-thumbnail img-rounded bg-light block mt-3" alt="banner">
          </div>

          <div class="form-group my-2">
            <label for="avatar">Foto</label>
            <input type="file" class="form-control-file" id="avatar" name="avatar">
            @error('avatar')
              <div class="alert alert-danger mt-2 col-md-4" role="alert">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group col-md-5 mt-4">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" id="nama" name="nama">
            @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group col-md-8">
            <label for="text">Deskripsi</label>
            <textarea class="form-control @error('text') is-invalid @enderror" id="text" name="text" rows="5" placeholder="Tulis deskripsi disini">{{ old('text') }}</textarea>
            @error('text')
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
      const avatar = document.getElementById('avatar');

      avatar.addEventListener('change', function (e) {
        preview_img.src = URL.createObjectURL(e.target.files[0]);

        avatar.addEventListener('load', function () {
          URL.revokeObjectURL(avatar.src) // free memory
        });

      });
    </script>
  </x-slot>
</x-layouts>