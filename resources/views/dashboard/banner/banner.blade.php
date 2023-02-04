<x-layouts.dashboard title="Banner">
  <x-slot:body>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Banner</h6>
      </div>
      <div class="card-body">
        <h1 class="h3 mb-0 text-gray-800 mb-2">Banner</h1>

        <a href="{{ route('banner.create') }}" class="btn btn-success btn-icon-split my-3">
          <span class="text">Tambah</span>
        </a>

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Foto Banner</th>
              <th>Terkhir Dibuat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Foto Banner</th>
              <th>Terkhir Dibuat</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
            <tbody>
              @foreach ($banner as $bnr)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <img class="img-responsive img-thumbnail img-rounded" width="150" height="100" src="{{ asset("storage/$bnr->nama_banner") }}" alt="">
                </td>
                <td>{{ $bnr->tanggal_buat }}</td>
                <td>
                  <form id="form_hapus_banner" action="{{ route('banner.destroy', $bnr) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button onclick="return false" id="hapus_banner" class="btn btn-danger btn-circle btn-sm">
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
  </x-slot>

    <x-slot:script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

      const allButtonDelete = document.querySelectorAll('#hapus_banner');
      const allFormDelete = document.querySelectorAll('#form_hapus_banner');

      allButtonDelete.forEach((OneButtonDelete, index) => {

        OneButtonDelete.addEventListener('click', function (e) {
          e.preventDefault();

          Swal.fire({
            title: 'kamu yakin ingin menghapus data tersebut ?',
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
