<x-layouts.dashboard title="update">
  <x-slot:body>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
      </div>
      <div class="card-body">
        <form
          action="{{ route('guru.update', $guru) }}"
          method="post"
          enctype="multipart/form-data"
          >
          @method('patch')
          @csrf

          @isset($guru->avatar)
            <div class="col-md-4">
              <img id="preview_img" width="140" src="{{asset("storage/$guru->avatar")}}" class="img-responsive img-thumbnail img-rounded bg-light block mt-3" alt="banner">
            </div>
          @else
            <div class="col-md-4">
              <img id="preview_img" width="140" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLavnf_WJPf90tUy9lDUy1y0tSlQDVc4TG0K1QExkL-A&s" class="img-responsive img-thumbnail img-rounded bg-light block mt-3" alt="banner">
            </div>
          @endisset

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
              <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap', $guru->nama_lengkap) }}" id="nama_lengkap" name="nama_lengkap">
              @error('nama_lengkap')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group col-md-2 col-sm-6 col-6">
              <label for="gelar_depan">Gelar Depan</label>
              <input type="text" class="form-control @error('gelar_depan') is-invalid @enderror" value="{{ old('gelar_depan', $guru->gelar_depan) }}" id="gelar_depan" name="gelar_depan">
              @error('gelar_depan')
                <div class="invalid-feedback">
                  {{ $message  }}
                </div>
              @enderror
            </div>

            <div class="form-group col-md-2 col-sm-6 col-6">
              <label for="gelar_belakang">Gelar Belakang</label>
              <input type="text" class="form-control @error('gelar_belakang') is-invalid @enderror" value="{{ old('gelar_belakang', $guru->gelar_belakang) }}" id="gelar_belakang" name="gelar_belakang">
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
                <option value="kepala sekolah" @if ($guru->status === 'kepala sekolah') selected @endif>Kepala Sekolah</option>
                <option value="guru" @if ($guru->status === 'guru') selected @endif>Guru</option>
              </select>
              @error('status')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group col-md-2 col-6">
              <label for="nip">NIP</label>
              <input type="text" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip', $guru->nip) }}" id="nip" name="nip">
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
                <option value="laki-laki" @if ($guru->jenis_kelamin == 'laki-laki') selected @endif>Laki-Laki</option>
                <option value="perempuan" @if ($guru->jenis_kelamin == 'perempuan') selected @endif >Perempuan</option>
              </select>
              @error('jenis_kelamin')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group col-md-3">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', $guru->alamat) }}" id="alamat" name="alamat">
              @error('alamat')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group col-md-3">
              <label for="tempat_lahir">Tempat Lahir</label>
              <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ old('tempat_lahir', $guru->tempat_lahir) }}" id="tempat_lahir" name="tempat_lahir">
              @error('tempat_lahir')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group col-md-2">
              <label for="tanggal_lahir">Tanggal Lahir</label>
              <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir', dateFormat2($guru->tanggal_lahir) ) }}" id="tanggal_lahir" name="tanggal_lahir">
              @error('tanggal_lahir')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group col-md-3">
              <label for="suku">Suku</label>
              <input type="text" class="form-control @error('suku') is-invalid @enderror" value="{{ old('suku', $guru->suku) }}" id="suku" name="suku">
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
                <option value="islam" @if ($guru->agama === 'islam') selected @endif>islam</option>
                <option value="kristen protestan" @if ($guru->agama === 'kristen protestan') selected @endif>kristen protestan</option>
                <option value="katolik" @if ($guru->agama === 'katolik') selected @endif>katolik</option>
                <option value="hindu" @if ($guru->agama === 'hindu') selected @endif>hindu</option>
                <option value="buddha" @if ($guru->agama === 'buddha') selected @endif>buddha</option>
                <option value="konghucu" @if ($guru->agama === 'konghucu') selected @endif>konghucu</option>
              </select>
              @error('agama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group col-md-3">
              <label for="nomor_telepon">Nomor Telepon</label>
              <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" value="{{ old('nomor_telepon', $guru->nomor_telepon) }}" id="nomor_telepon" name="nomor_telepon">
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
              <input class="form-check-input" type="checkbox" name="mataPelajaran[]" value="{{$mp->id}}" id="{{$mp->nama}}" @if (in_array($mp->id, $guru->mataPelajaran->pluck('id')->toArray() )) checked @endif >
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
              <input class="form-check-input" type="checkbox" name="jurusan[]" value="{{$jur->id}}" id="{{$jur->nama}}" @if (in_array($jur->id, $guru->jurusan->pluck('id')->toArray() )) checked @endif>
              <label class="form-check-label" for="{{$jur->nama}}">
                {{ $jur->nama }}
              </label>
            </div>
            @endforeach
          </div>

          <button class="btn btn-success my-3">Perbaharui</button>
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
