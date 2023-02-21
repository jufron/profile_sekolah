<x-layouts.dashboard title="Ubah">
  <x-slot:body>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Jurnal Kelas</h6>
      </div>
      <div class="card-body">
        <form action="{{ route('jurnal.update', $jurnalKelas) }}" method="post">
          @method('patch')
          @csrf
          <div class="row">
            <div class="form-group col-md-3">
              <label for="tanggal">Tanggal Mengajar</label>
              <input type="date" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $jurnalKelas->tanggal) }}" id="tanggal" name="tanggal">
              @error('tanggal')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label for="mata_pelajaran_id">Mata Pelajaran</label>
              <select class="custom-select @error('mata_pelajaran_id') is-invalid @enderror" id="mata_pelajaran_id" name="mata_pelajaran_id">
                <option selected disabled value="">Pilih...</option>
                @foreach ($mataPelajaran as $mp)
                  <option value="{{ $mp->id }}" @if ($mp->id == $jurnalKelas->mata_pelajaran_id) selected @endif> {{ $mp->nama }} </option>
                @endforeach
              </select>
              @error('mata_pelajaran_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group col-md-2">
              <label for="kelas">Kelas</label>
              <select class="custom-select @error('kelas') is-invalid @enderror" id="kelas" name="kelas">
                <option selected disabled value="">Pilih...</option>
                <option value="X" @if ($jurnalKelas->kelas == 'X') selected @endif>X</option>
                <option value="XI" @if ($jurnalKelas->kelas == 'XI') selected @endif>XI</option>
                <option value="XII" @if ($jurnalKelas->kelas == 'XII') selected @endif>XII</option>
              </select>
              @error('kelas')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-4">
              <label for="jurusan_id">Jurusan</label>
              <select class="custom-select @error('jurusan_id') is-invalid @enderror" id="jurusan_id" name="jurusan_id">
                <option selected disabled value="">Pilih...</option>
                @foreach ($jurusan as $jur)
                  <option value="{{ $jur->id }}" @if ($jur->id == $jurnalKelas->jurusan_id) selected @endif> {{ $jur->nama }} </option>
                @endforeach
              </select>
              @error('jurusan_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group col-md-2">
              <label for="jam_ke">Jam Ke</label>
              <input type="text" class="form-control @error('jam_ke') is-invalid @enderror" value="{{ old('jam_ke', $jurnalKelas->jam_ke) }}" id="jam_ke" name="jam_ke">
              <small id="emailHelp" class="form-text text-muted">Contoh 1 - 5, 3 - 6 dst</small>
              @error('jam_ke')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>

          <div class="form-group col-md-9">
            <label for="materi_pokok">Materi Pembahasan</label>
            <textarea class="form-control @error('materi_pokok') is-invalid @enderror" id="materi_pokok" name="materi_pokok" rows="4" placeholder="Tulis materi disini">{{ old('materi_pokok', $jurnalKelas->materi_pokok) }}</textarea>
            @error('materi_pokok')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="row">
            <div class="form-group col-md-3">
              <label for="sakit">Sakit</label>
              <input type="text" class="form-control @error('sakit') is-invalid @enderror" value="{{ old('sakit', $jurnalKelas->sakit) }}" id="sakit" name="sakit">
              <small id="emailHelp" class="form-text text-muted">Jika tidak ada yang sakit isi angka 0 </small>
              @error('sakit')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group col-md-3">
              <label for="ijin">Ijin</label>
              <input type="text" class="form-control @error('ijin') is-invalid @enderror" value="{{ old('ijin', $jurnalKelas->ijin) }}" id="ijin" name="ijin">
              <small id="emailHelp" class="form-text text-muted">Jika tidak ada yang ijin isi angka 0 </small>
              @error('ijin')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group col-md-3">
              <label for="alpha">Alpha</label>
              <input type="text" class="form-control @error('alpha') is-invalid @enderror" value="{{ old('alpha', $jurnalKelas->alpha) }}" id="alpha" name="alpha">
              <small id="emailHelp" class="form-text text-muted">Jika tidak ada yang alpha isi angka 0 </small>
              @error('alpha')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>

          <button class="btn btn-success my-3">Perbaharui</button>
        </form>
      </div>
    </div>
  </x-slot>
</x-layouts>
