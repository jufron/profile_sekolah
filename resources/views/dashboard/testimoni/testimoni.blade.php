<x-layouts.dashboard title="Testimoni">
  <x-slot:body>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Testimoni</h6>
      </div>
      <div class="card-body">
        <h1 class="h3 mb-0 text-gray-800 mb-2">Testimoni</h1>

        <a href="{{ route('testimoni.create') }}" class="btn btn-success btn-icon-split my-3">
          <span class="text">Tambah</span>
        </a>

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Foto</th>
              <th>Deskripsi</th>
              <th>Terakhir Dibuat</th>
              <th>Terakhir Diperbaharui</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Foto</th>
              <th>Deskripsi</th>
              <th>Terakhir Dibuat</th>
              <th>Terakhir Diperbaharui</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
            <tbody>
              @foreach ($testimoni as $tstmni)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tstmni->nama }}</td>
                <td>
                  <img class="img-responsive img-thumbnail img-rounded" width="150" height="100" src="{{ asset("storage/$tstmni->avatar") }}" alt="">
                </td>
                <td>{{ $tstmni->text_limit }}</td>
                <td>{{ $tstmni->tanggal_buat }}</td>
                <td>{{ $tstmni->tanggal_perbaharui }}</td>
                <td>
                  <form id="form_hapus_testimoni" action="{{ route('testimoni.destroy', $tstmni) }}" method="POST" class="flex">
                    @method('delete')
                    @csrf
                    <a href="#" route-testimoni="{{ route('testimoni.show', $tstmni) }}" id="show_testimoni" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#testimoni_modal">
                      <i class="fas fa-info-circle"></i>
                    </a>
                      <a href="{{ route('testimoni.edit', $tstmni) }}" class="btn btn-warning btn-circle btn-sm">
                        <i class="fas fa-exclamation-triangle"></i>
                    </a>
                    <button onclick="return false" id="hapus_testimoni" class="btn btn-danger btn-circle btn-sm" data-nama-testimoni="{{ $tstmni->nama }}">
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

    <x-bootstrap.modal
      modalId="testimoni_modal"
      modalLabel="testimoni_label"
      modalTitle="testimoni">
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
      const buttonShowTestimoni = document.querySelectorAll('#show_testimoni');
      const modalBodyShow = document.querySelector('#modal_body_show');

      buttonShowTestimoni.forEach(buttonTestimoni => {
        buttonTestimoni.addEventListener('click', function () {

          const route = this.getAttribute('route-testimoni');

          loader(true);

          fetch(route)
            .then(res => res.json())
            .then(result => {
              displayData(result.testimoni);
            });

        });
      });

      function displayData ({avatar, text, nama, file_storage, tanggal_buat, tanggal_perbaharui}) {
        loader(false);
        const element = `
          <img class="img-responsive img-thumbnail img-rounded" width="150" height="100" src="${file_storage}" alt="">
          <h2 class="mt-3">${nama}</h2>
          <p class="mt-3">${text}</p>
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

      const allHapusTestimoni = document.querySelectorAll('#hapus_testimoni');
      const allFormHapusTestimmoni = document.querySelectorAll('#form_hapus_testimoni');

      allHapusTestimoni.forEach( (hapusButtonTestimoni, index) => {
        hapusButtonTestimoni.addEventListener('click', function (e) {          
          e.preventDefault();

          const namaTestimoni = this.getAttribute('data-nama-testimoni');

          Swal.fire({
            title: 'kamu yakin ingin menghapus data tersebut ?',
            text: `Nama : ${namaTestimoni}`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.isConfirmed) {
              allFormHapusTestimmoni[index].submit();
            }
          });


        });
      });


    </script>
  </x-slot>
</x-layouts>