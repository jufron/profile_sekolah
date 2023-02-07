<x-layouts.dashboard title="Telepon">
  <x-slot:body>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Telepon</h6>
      </div>
      <div class="card-body">
        <h1 class="h3 text-gray-800 mb-2">Telepon</h1>

        <a href="{{ route('telepon.create') }}" class="btn btn-success btn-icon-split my-3">
          <span class="text">Tambah</span>
        </a>

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Name </th>
              <th>No Telepon</th>
              <th>Terkhir Dibuat</th>
              <th>Terkhir Diperbaharui</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>No Telepon</th>
              <th>Terkhir Dibuat</th>
              <th>Terkhir Diperbaharui</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
            <tbody>
              @foreach ($telepon as $tlp)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tlp->nama }}</td>
                <td>{{ $tlp->nomor }}</td>
                <td>{{ $tlp->tanggal_buat }}</td>
                <td>{{ $tlp->tanggal_perbaharui }}</td>
                <td>
                  <form id="form_hapus_telepon" action="{{ route('telepon.destroy', $tlp) }}" method="POST">
                    @method('delete')
                    @csrf
                    <a href="{{ route('telepon.edit', $tlp) }}" class="btn btn-warning btn-circle btn-sm">
                        <i class="fas fa-exclamation-triangle"></i>
                    </a>
                    <button onclick="return false" id="hapus_telepon" class="btn btn-danger btn-circle btn-sm" data-nama="{{ $tlp->nama }}" data-nomor="{{ $tlp->nomor }}">
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

      const allButtonDelete = document.querySelectorAll('#hapus_telepon');
      const allFormDelete = document.querySelectorAll('#form_hapus_telepon');

      allButtonDelete.forEach((OneButtonDelete, index) => {

        let nama = OneButtonDelete.getAttribute('data-nama');
        let telepon = OneButtonDelete.getAttribute('data-nomor');

        OneButtonDelete.addEventListener('click', function (e) {
          e.preventDefault();

          Swal.fire({
            title: 'kamu yakin ingin menghapus data tersebut ?',
            text: `Nama : ${nama} No Telepon : ${telepon}`,
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
