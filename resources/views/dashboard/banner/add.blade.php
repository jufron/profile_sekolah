<x-layouts.dashboard title="Tambah">
  <x-slot:body>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Foto Banner</h6>
      </div>
      <div class="card-body">
        <form 
          action="{{ route('banner.store') }}" 
          method="post" 
          class="col-md-4" 
          enctype="multipart/form-data"
          >
          @csrf
          <img id="preview_img" style="width: 300px height: 200px" src="" class="img-responsive img-thumbnail img-rounded bg-light block" alt="banner">
          <div class="form-group">
            <label for="nama_banner">Gambar</label>
            <input type="file" class="form-control-file" id="nama_banner" name="nama_banner">
            @error('nama_banner')
              <div class="alert alert-danger mt-2" role="alert">
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
      const nama_banner = document.getElementById('nama_banner');

      nama_banner.addEventListener('change', function (e) {
        preview_img.src = URL.createObjectURL(e.target.files[0]);

        nama_banner.addEventListener('load', function () {
          URL.revokeObjectURL(nama_banner.src) // free memory
        });

      });

    </script>
  </x-slot>
</x-layouts>
