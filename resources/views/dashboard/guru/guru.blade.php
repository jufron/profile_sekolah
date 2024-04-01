<x-layouts.dashboard title="guru">
  <x-slot:style>
      {{--  Custom styles for this page  --}}
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  </x-slot>
  <x-slot:body>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Guru</h6>
      </div>
      <div class="card-body">
        <h1 class="h3 text-gray-800 mb-2">Guru</h1>

        <a href="{{ route('guru.laporan') }}" class="btn btn-info btn-icon-split my-3">
          <span class="text">Laporan</span>
        </a>

        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="guruTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>avatar</th>
              <th>email</th>
              <th>Nama Lengkap</th>
              <th>NIP</th>
              <th>Jenis Kelamin</th>
              <th>Suku</th>
              <th>agama</th>
              <th>Terkhir Dibuat</th>
              <th>Terakhir Diperbaharui</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>avatar</th>
              <th>email</th>
              <th>Nama Lengkap</th>
              <th>NIP</th>
              <th>Jenis Kelamin</th>
              <th>Suku</th>
              <th>agama</th>
              <th>Terkhir Dibuat</th>
              <th>Terakhir Diperbaharui</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
            <tbody>
              @foreach ($allGuru as $guru)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <img class="img-responsive img-thumbnail img-rounded" width="150" height="100" src="{{ asset("storage/$guru->avatar") }}" alt="foto_profil_guru">
                </td>
                <td>{{ $guru->user->email }}</td>
                <td>{{ $guru->gelar_depan ? "$guru->gelar_depan," : '' }} {{ "$guru->nama_lengkap," }} {{ $guru->gelar_belakang }}</td>
                <td>{{ $guru->nip ?? '-' }}</td>
                <td>{{ $guru->jenis_kelamin }}</td>
                <td>{{ $guru->suku }}</td>
                <td>{{ $guru->agama }}</td>
                <td>{{ dateTimeFormat($guru->created_at) }}</td>
                <td>{{ dateTimeFormat($guru->updated_at) }}</td>
                <td>
                  <form id="form_hapus_guru" action="" method="POST">
                    @method('delete')
                    @csrf
                    <a href="#" route-guru="{{ route('guru_manajement.show', $guru) }}" id="show_guru" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#jurnal_kelas_modal">
                      <i class="fas fa-info-circle"></i>
                    </a>
                    <button onclick="return false" id="hapus_guru" class="btn btn-danger btn-circle btn-sm">
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
    {{-- buat fitur laporan besok--}}
    <x-bootstrap.modal
      modalId="jurnal_kelas_modal"
      modalLabel="guru_label"
      modalTitle="guru"
      >
      <div class="modal-body" id="modal_body_show">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </x-bootstrap>
  </x-slot>
  <x-slot:script>

      {{-- Page level plugins --}}
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src=" {{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

      $(document).ready(function() {
        $('#guruTable').DataTable();
      });

      const buttonShowGuru = document.querySelectorAll('#show_guru');
      const modalBodyShow = document.querySelector('#modal_body_show');

      buttonShowGuru.forEach( (buttonGuru) => {
        buttonGuru.addEventListener('click', function () {

          const route = this.getAttribute('route-guru');

          loader(true);

          fetch(route)
            .then(res => res.json())
            .then(result => {
              console.log(result);
              displayData(result.guru);
            });

        });
      });

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

        function displayData ({
          nama_lengkap,
          gelar_depan,
          gelar_belakang,
          avatar_storage,
          status,
          nip,
          jenis_kelamin,
          agama,
          suku,
          alamat,
          tempat_lahir,
          tanggal_lahir,
          tempat_tanggal_lahir,
          tanggal_buat,
          tanggal_perbaharui
        }) {

            loader(false);

            const element = `
              <img class="img-responsive img-thumbnail img-rounded" width="140" src="${avatar_storage}" alt="">
              <h3 class="mt-3"> ${gelar_depan ? gelar_belakang + ',' : ''} ${nama_lengkap}, ${gelar_belakang} </h3>

              <div class="row mt-4">
                <div class="col-md-5 col-6">
                  Status
                </div>
                <div class="col-md-7 col-6">
                  : ${status}
                </div>
              </div>
              <div class="row">
                <div class="col-md-5 col-6">
                  NIP
                </div>
                <div class="col-md-7 col-6">
                  : ${nip ?? '-'}
                </div>
              </div>
              <div class="row">
                <div class="col-md-5 col-6">
                  Jenis Kelamin
                </div>
                <div class="col-md-7 col-6">
                  : ${jenis_kelamin}
                </div>
              </div>
              <div class="row">
                <div class="col-md-5 col-6">
                  Agama
                </div>
                <div class="col-md-7 col-6">
                  : ${agama}
                </div>
              </div>
              <div class="row">
                <div class="col-md-5 col-6">
                  Suku
                </div>
                <div class="col-md-7 col-6">
                  : ${suku}
                </div>
              </div>
              <div class="row">
                <div class="col-md-5 col-6">
                  Alamat
                </div>
                <div class="col-md-7 col-6">
                  : ${alamat}
                </div>
              </div>
              <div class="row">
                <div class="col-md-5 col-6">
                  Tempat Lahir
                </div>
                <div class="col-md-7 col-6">
                  : ${tempat_lahir}
                </div>
              </div>
              <div class="row">
                <div class="col-md-5 col-6">
                  Tanggal Lahir
                </div>
                <div class="col-md-7 col-6">
                  :(${tempat_tanggal_lahir}
                </div>
              </div>

              <div class="row mt-2">
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

      // delete
      const allButtonDelete = document.querySelectorAll('#hapus_guru');
      const allFormDelete = document.querySelectorAll('#form_hapus_guru');

      allButtonDelete.forEach((OneButtonDelete, index) => {

        OneButtonDelete.addEventListener('click', function (e) {
          e.preventDefault();

          Swal.fire({
            title: 'kamu yakin ingin menghapus data tersebut ?',
            text: 'Pastikan untuk membuat laporan sebelum menghapus secara permanen',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.isConfirmed) {
              allFormDelete[index].submit();
            }
          })

        });
      });

    </script>

  </x-slot>
</x-layouts>
