<x-layouts.dashboard title="Add">
  <x-slot:body>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
      </div>
      <div class="card-body">
        <form
          action="{{ route('guru.store') }}"
          method="post"
          enctype="multipart/form-data"
          >
          @csrf

          <div class="col-md-4">
            <img id="preview_img" width="140" src="" class="img-responsive img-thumbnail img-rounded bg-light block mt-3" alt="banner">
          </div>

          <div class="form-group my-2">
            <label for="avatar">Avatar</label>
            <input type="file" class="form-control-file" id="avatar" name="avatar">
            @error('avatar')
              <div class="alert alert-danger mt-2 col-md-4" role="alert">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="row mt-4">
            <div class="form-group col-md-5">
              <label for="nama_lengkap">Nama Lengkap</label>
              <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap') }}" id="nama_lengkap" name="nama_lengkap">
              @error('nama_lengkap')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group col-md-2 col-sm-6 col-6">
              <label for="gelar_depan">Gelar Depan</label>
              <input type="text" class="form-control @error('gelar_depan') is-invalid @enderror" value="{{ old('gelar_depan') }}" id="gelar_depan" name="gelar_depan">
              @error('gelar_depan')
                <div class="invalid-feedback">
                  {{ $message  }}
                </div>
              @enderror
            </div>

            <div class="form-group col-md-2 col-sm-6 col-6">
              <label for="gelar_belakang">Gelar Belakang</label>
              <input type="text" class="form-control @error('gelar_belakang') is-invalid @enderror" value="{{ old('gelar_belakang') }}" id="gelar_belakang" name="gelar_belakang">
              @error('gelar_belakang')
                <div class="invalid-feedback">
                  {{ $message  }}
                </div>
              @enderror
            </div>

            <div class="form-group col-md-3 col-6">
              <label for="status">Status</label>
              <select class="custom-select @error('status') is-invalid @enderror" id="status" name="status">
                <option selected disabled value="">Pilih...</option>
                <option value="kepala sekolah">Kepala Sekolah</option>
                <option value="guru">Guru</option>
              </select>
              @error('status')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group col-md-2 col-6">
              <label for="nip">NIP</label>
              <input type="text" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip') }}" id="nip" name="nip">
              @error('nip')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group col-md-2 col-6">
              <label for="jenis_kelamin">Jenis Kelamin</label>
              <select class="custom-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin">
                <option selected disabled value="">Pilih...</option>
                <option value="laki-laki">Laki-Laki</option>
                <option value="perempuan">Perempuan</option>
              </select>
              @error('jenis_kelamin')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group col-md-3">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" id="alamat" name="alamat">
              @error('alamat')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group col-md-3">
              <label for="tempat_lahir">Tempat Lahir</label>
              <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ old('tempat_lahir') }}" id="tempat_lahir" name="tempat_lahir">
              @error('tempat_lahir')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group col-md-2">
              <label for="tanggal_lahir">Tanggal Lahir</label>
              <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir') }}" id="tanggal_lahir" name="tanggal_lahir">
              @error('tanggal_lahir')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group col-md-3">
              <label for="suku">Suku</label>
              <input type="text" class="form-control @error('suku') is-invalid @enderror" value="{{ old('suku') }}" id="suku" name="suku">
              @error('suku')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group col-md-2 col-6">
              <label for="agama">Agama</label>
              <select class="custom-select @error('agama') is-invalid @enderror" id="agama" name="agama">
                <option selected disabled value="">Pilih...</option>
                <option value="islam">islam</option>
                <option value="kristen protestan">kristen protestan</option>
                <option value="katolik">katolik</option>
                <option value="hindu">hindu</option>
                <option value="buddha">buddha</option>
                <option value="konghucu">konghucu</option>
              </select>
              @error('agama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group col-md-3">
              <label for="nomor_telepon">Nomor Telepon</label>
              <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" value="{{ old('nomor_telepon') }}" id="nomor_telepon" name="nomor_telepon">
              @error('nomor_telepon')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>

          <p class="pl-2 pt-2">Mata Pelajaran</p>
          @error('mataPelajaran')
            <div class="alert alert-danger mt-2 col-md-4" role="alert">
              {{ $message }}
            </div>
          @enderror
          <hr>
          <div class="row px-2">
            @foreach ($mataPelajaran as $mp)
            <div class="form-check col-md-4 my-1">
              <input class="form-check-input" type="checkbox" name="mataPelajaran[]" value="{{$mp->id}}" id="{{$mp->nama}}" @if (in_array($mp->id, old('mataPelajaran', []))) checked @endif >
              <label class="form-check-label" for="{{$mp->nama}}">
                {{ $mp->nama }}
              </label>
            </div>
            @endforeach
          </div>
          <hr>

          <p class="pl-2 pt-2">Jurusan</p>
          @error('jurusan')
            <div class="alert alert-danger mt-2 col-md-4" role="alert">
              {{ $message }}
            </div>
          @enderror
          <hr>
          <div class="row px-2">
            @foreach ($jurusan as $jur)
            <div class="form-check col-md-4 my-1">
              <input class="form-check-input" type="checkbox" name="jurusan[]" value="{{$jur->id}}" id="{{$jur->nama}}" @if (in_array($jur->id, old('jurusan', []))) checked @endif>
              <label class="form-check-label" for="{{$jur->nama}}">
                {{ $jur->nama }}
              </label>
            </div>
            @endforeach
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
