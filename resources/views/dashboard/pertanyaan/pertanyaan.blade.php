<x-layouts.dashboard title="Pertanyaan">
  <x-slot:body>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftaar Pertanyaan</h6>
      </div>
      <div class="card-body">
        <h1 class="h3 mb-0 text-gray-800 mb-2">Pertanyaan</h1>

        <a href="{{ route('pertanyaan.create') }}" class="btn btn-success btn-icon-split my-3">
          <span class="text">Tambah</span>
        </a>

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Pertanyaan</th>
              <th>Jawaban</th>
              <th>Terkhir Dibuat</th>
              <th>Terkhir Diperbaharui</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Pertanyaan</th>
              <th>Jawaban</th>
              <th>Terkhir Dibuat</th>
              <th>Terkhir Diperbaharui</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
            <tbody>
              @foreach ($daftarPertanyaan as $dftrPertnyaan)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dftrPertnyaan->pertanyaan }}</td>
                <td>{{ $dftrPertnyaan->jawaban }}</td>
                <td>{{ $dftrPertnyaan->tanggal_buat }}</td>
                <td>{{ $dftrPertnyaan->tanggal_perbaharui }}</td>
                <td>
                  <form id="form_hapus_pertanyaan" action="{{ route('pertanyaan.destroy', $dftrPertnyaan) }}" method="POST">
                    @method('delete')
                    @csrf
                    <a href="{{ route('pertanyaan.edit', $dftrPertnyaan) }}" class="btn btn-warning btn-circle btn-sm">
                        <i class="fas fa-exclamation-triangle"></i>
                    </a>
                    <button onclick="return false" id="hapus_pertanyaan" class="btn btn-danger btn-circle btn-sm">
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
      const allButtonPertanyaanDelete = document.querySelectorAll('#hapus_pertanyaan');
      const allFormHapusPertanyaan = document.querySelectorAll('#form_hapus_pertanyaan');

      allButtonPertanyaanDelete.forEach((buttonPertanyaanDelete, index) => {
        buttonPertanyaanDelete.addEventListener('click', function (e) {
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
              allFormHapusPertanyaan[index].submit();
            }
          });

        });
      });
    </script>
  </x-slot>
</x-layouts>
