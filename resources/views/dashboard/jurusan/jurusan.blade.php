<x-layouts.dashboard title="Jurusan">
  <x-slot:body>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Jurusan</h6>
      </div>
      <div class="card-body">
        <h1 class="h3 text-gray-800 mb-2">Jurusan</h1>

        <a href="{{ route('jurusan.create') }}" class="btn btn-success btn-icon-split my-3">
          <span class="text">Tambah</span>
        </a>

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Jurusan</th>
              <th>Poster</th>
              <th>Singkatan</th>
              <th>Terjemahan</th>
              <th>Deskripsi</th>
              <th>Terakhir Dibuat</th>
              <th>Terakhir Diperbaharui</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Nama Jurusan</th>
              <th>Poster</th>
              <th>Singkatan</th>
              <th>Terjemahan</th>
              <th>Deskripsi</th>
              <th>Terakhir Dibuat</th>
              <th>Terakhir Diperbaharui</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
            <tbody>
              @foreach ($jurusan as $jur)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $jur->nama }}</td>
                <td>
                  <img class="img-responsive img-thumbnail img-rounded" width="150" height="100" src="{{ asset("storage/$jur->poster") }}" alt="">
                </td>
                <td>{{ $jur->singkatan }}</td>
                <td>{{ $jur->terjemahan }}</td>
                <td>{{ $jur->text_limit }}</td>
                <td>{{ $jur->tanggal_buat }}</td>
                <td>{{ $jur->tanggal_perbaharui }}</td>
                <td>
                  <form id="form_hapus_jurusan" action="{{ route('jurusan.destroy', $jur) }}" method="POST" class="flex">
                    @method('delete')
                    @csrf
                    <a href="#" route-jurusan="{{ route('jurusan.show', $jur) }}" id="show_jurusan" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#jurusan_modal">
                      <i class="fas fa-info-circle"></i>
                    </a>
                      <a href="{{ route('jurusan.edit', $jur) }}" class="btn btn-warning btn-circle btn-sm">
                        <i class="fas fa-exclamation-triangle"></i>
                    </a>
                    <button onclick="return false" id="hapus_jurusan" class="btn btn-danger btn-circle btn-sm" data-nama-jurusan="{{ $jur->nama }}">
                      <i class="fas fa-trash"></i>
                    </button>
                    </a>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    {{-- modal hapus --}}
    <x-bootstrap.modal
      modalId="jurusan_modal"
      modalLabel="jurusan_label"
      modalTitle="Jurusan">
      <div class="modal-body" id="modal_body_show">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </x-bootstrap>

  </x-slot>
  <x-slot:script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      const buttonShowJurusan = document.querySelectorAll('#show_jurusan');
      const modalBodyShow = document.querySelector('#modal_body_show');

      buttonShowJurusan.forEach((buttonJurusan) => {
        buttonJurusan.addEventListener('click', function () {

          const route = this.getAttribute('route-jurusan');

          loader(true);

          fetch(route)
            .then(res => res.json())
            .then(result => {
              displayData(result.jurusan);
            });

        });
      });

      function displayData ({
          poster,
          nama,
          deskripsi,
          file_storage,
          singkatan_is_null,
          terjemahan,
          tanggal_buat,
          tanggal_perbaharui
        }) {

            loader(false);

            const element = `
              <img class="img-responsive img-thumbnail img-rounded" width="150" height="100" src="${file_storage}" alt="">
              <h2 class="mt-3">${nama} ${singkatan_is_null}</h2>
              <small class="text-muted">${terjemahan}</small>
              <p class="mt-3">${deskripsi}</p>
              <div class="row mt-4">
                <div class="col-md-5 col-6">
                  Tanggal Buat
                </div>
                <div class="col-md-7 col-6">
                  : ${tanggal_buat}
                </div>
              </div>
              <div class="row">
                <div class="col-md-5 col-6">
                  Tanggal Perbaharui
                </div>
                <div class="col-md-7 col-6">
                  : ${tanggal_perbaharui}
                </div>
              </div>
            `;
            modalBodyShow.innerHTML = element;
      }

      function loader (boolValue) {
        const elementLoading = `
          <div class="d-flex align-items-center justify-content-center">
            <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>
        `;

        if (boolValue) {
          modalBodyShow.innerHTML = elementLoading;
        } else {
          modalBodyShow.innerHTML = '';
        }

      }

      const allButtonJurusanDelete = document.querySelectorAll('#hapus_jurusan');
      const allFormHapus = document.querySelectorAll('#form_hapus_jurusan');

      allButtonJurusanDelete.forEach((buttonJurusanDelete, index) => {
        buttonJurusanDelete.addEventListener('click', function (e) {
          e.preventDefault();

          const namaJurusan = this.getAttribute('data-nama-jurusan');

          Swal.fire({
            title: 'kamu yakin ingin menghapus data tersebut ?',
            text: `Nama Jurusan : ${namaJurusan}`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.isConfirmed) {
              allFormHapus[index].submit();
            }
          });

        });
      });

    </script>
  </x-slot>
</x-layouts>
