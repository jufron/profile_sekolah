<x-layouts.dashboard title="Profil Guru">
  <x-slot:body>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Profil Guru</h6>
      </div>
      <div class="card-body">
        <div class="row justify-content-between mx-3">

          @isset($oneGuru->avatar)
            <div class="col-md-4">
              <img id="preview_img" width="140" src="{{asset("storage/$oneGuru->avatar")}}" class="img-responsive img-thumbnail img-rounded bg-light block mt-3" alt="banner">
            </div>
          @else
            <div class="col-md-4">
              <img id="preview_img" width="140" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLavnf_WJPf90tUy9lDUy1y0tSlQDVc4TG0K1QExkL-A&s" class="img-responsive img-thumbnail img-rounded bg-light block mt-3" alt="banner">
            </div>
          @endisset

          @if ($oneGuru)
          {{-- jika data sudah ada maka tampil tombol update --}}
           <div>
            <a href="{{ route('guru.edit', $oneGuru) }}" class="btn btn-warning btn-icon-split my-3">
              <span class="text">Perbaharui Data Diri</span>
            </a>
          </div>
          @else
          <div>
            <a href="{{ route('guru.create') }}" class="btn btn-success btn-icon-split my-3">
              <span class="text">Lengkapi Data Diri</span>
            </a>
          </div>
          @endif
        </div>

        <ul class="list-group list-group-flush overflow-auto">
          <li class="list-group-item">
            <div class="row">
              <div class="col-md-6 col-6">
                Nama Lengkap
              </div>
              <div class="col-md-6 col-6">
                <span>: {{ $oneGuru->nama_lengkap ?? '-' }}</span>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="row">
              <div class="col-md-6 col-6">
                NIP
              </div>
              <div class="col-md-6 col-6">
                <span>: {{ $oneGuru->nip ?? '-' }}</span>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="row">
              <div class="col-md-6 col-6">
                Status
              </div>
              <div class="col-md-6 col-6">
                <span>: {{ $oneGuru->status ?? '-' }}</span>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="row">
              <div class="col-md-6 col-6">
                Gelar Depan
              </div>
              <div class="col-md-6 col-6">
                <span>: {{ $oneGuru->gelar_depan ?? '-' }}</span>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="row">
              <div class="col-md-6 col-6">
                Gelar Belakang
              </div>
              <div class="col-md-6 col-6">
                <span>: {{ $oneGuru->gelar_belakang ?? '-' }}</span>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="row">
              <div class="col-md-6 col-6">
                Jenis Kelamin
              </div>
              <div class="col-md-6 col-6">
                <span>: {{ $oneGuru->jenis_kelamin ?? '-' }}</span>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="row">
              <div class="col-md-6 col-6">
                Alamat
              </div>
              <div class="col-md-6 col-6">
                <span>: {{ $oneGuru->alamat ?? '-' }}</span>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="row">
              <div class="col-md-6 col-6">
                Tempat Lahir
              </div>
              <div class="col-md-6 col-6">
                <span>: {{ $oneGuru->tempat_lahir ?? '-' }}</span>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="row">
              <div class="col-md-6 col-6">
                Tanggal Lahir
              </div>
              <div class="col-md-6 col-6">
                <span>: @isset($oneGuru) {{ dateTimeFormat($oneGuru->tanggal_lahir) }} @else - @endisset </span>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="row">
              <div class="col-md-6 col-6">
                Agama
              </div>
              <div class="col-md-6 col-6">
                <span>: {{ $oneGuru->agama ?? '-' }}</span>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="row">
              <div class="col-md-6 col-6">
                Nomor Telepon
              </div>
              <div class="col-md-6 col-6">
                <span>: {{ $oneGuru->nomor_telepon ?? '-' }}</span>
              </div>
            </div>
          </li>
        </ul>

        <div class="px-3 d-flex mt-3 justify-content-between align-items-center">
          <p>Mata Pelajaran</p>
        </div>
        <div class="row px-3">
          @if ($oneGuru)
            @foreach ($oneGuru->mataPelajaran as $mp)
              <h5 class="mx-1"><span class="btn btn-outline-secondary">{{ $mp->nama }}</span></h5>
            @endforeach
          @endif
        </div>

        <div class="px-3 d-flex mt-3 justify-content-between align-items-center">
          <p>Jurusan</p>
        </div>
        <div class="row px-3">
          @if ($oneGuru)
            @foreach ($oneGuru->jurusan as $jur)
            <h5 class="mx-1"><span class="btn btn-outline-secondary">{{$jur->nama}}</span></h5>
            @endforeach
          @endif
        </div>

      </div>
    </div>
  </x-slot>

</x-layouts>
