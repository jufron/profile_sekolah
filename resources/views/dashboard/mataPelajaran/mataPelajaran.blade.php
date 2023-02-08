<x-layouts.dashboard title="Mata Pelajaran">
  <x-slot:body>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Mata Pelajaran</h6>
      </div>
      <div class="card-body">
        <h1 class="h3 text-gray-800 mb-2">Mata Pelajaran</h1>

        <a href="{{ route('mata-pelajaran.create') }}" class="btn btn-success btn-icon-split my-3">
          <span class="text">Tambah</span>
        </a>

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Name </th>
              <th>Terkhir Dibuat</th>
              <th>Terkhir Diperbaharui</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Terkhir Dibuat</th>
              <th>Terkhir Diperbaharui</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
            <tbody>
              @foreach ($mataPelajaran as $mp)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mp->nama }}</td>
                <td>{{ $mp->tanggal_buat }}</td>
                <td>{{ $mp->tanggal_perbaharui }}</td>
                <td>
                  <form id="form_hapus_mata_pelajaran" action="{{ route('mata-pelajaran.destroy', $mp) }}" method="POST">
                    @method('delete')
                    @csrf
                    <a href="{{ route('mata-pelajaran.edit', $mp) }}" class="btn btn-warning btn-circle btn-sm">
                        <i class="fas fa-exclamation-triangle"></i>
                    </a>
                    <button onclick="return false" id="hapus_mata_pelajaran" class="btn btn-danger btn-circle btn-sm" nama-mata-pelajaran="{{ $mp->nama }}">
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
      const allButtonHapusMataPelajaran = document.querySelectorAll('#hapus_mata_pelajaran');
      const allFormHapusMataPelajaran = document.querySelectorAll('#form_hapus_mata_pelajaran');

      allButtonHapusMataPelajaran.forEach((buttonHapusMataPelajaran, index) => {

        let nama = buttonHapusMataPelajaran.getAttribute('nama-mata-pelajaran');

        buttonHapusMataPelajaran.addEventListener('click', function (e) {
          e.preventDefault();

          Swal.fire({
            title: 'kamu yakin ingin menghapus data tersebut ?',
            text: `Nama pelajaran : ${nama}`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.isConfirmed) {
              allFormHapusMataPelajaran[index].submit();
            }
          })

        });
      });
    </script>
  </x-slot>
</x-layouts>
