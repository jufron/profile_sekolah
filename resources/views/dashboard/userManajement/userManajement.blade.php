<x-layouts.dashboard title="User Manajement">
  <x-slot:body>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
      </div>
      <div class="card-body">
        <h1 class="h3 text-gray-800 mb-2">User</h1>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Role</th>
              <th>email</th>
              <th>Terkhir Dibuat</th>
              <th>Terkhir Diperbaharui</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Role</th>
              <th>email</th>
              <th>Terkhir Dibuat</th>
              <th>Terkhir Diperbaharui</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{!! checkRole($user) !!}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->tanggal_buat }}</td>
                <td>{{ $user->tanggal_perbaharui }}</td>
                <td>
                  <form id="form_hapus_user" action="{{ route('user_manajement.destroy', $user) }}" method="POST">
                    @method('delete')
                    @csrf
                    <a href="{{ route('user_manajement.edit', $user) }}" class="btn btn-warning btn-circle btn-sm">
                        <i class="fas fa-exclamation-triangle"></i>
                    </a>
                    <button onclick="return false" id="hapus_user" data-name="{{ $user->name }}" data-email="{{ $user->email }}" class="btn btn-danger btn-circle btn-sm">
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

      const allButtonDelete = document.querySelectorAll('#hapus_user');
      const allFormDelete = document.querySelectorAll('#form_hapus_user');

      allButtonDelete.forEach((OneButtonDelete, index) => {

        const nama = OneButtonDelete.getAttribute('data-name');
        const email = OneButtonDelete.getAttribute('data-email');

        OneButtonDelete.addEventListener('click', function (e) {
          e.preventDefault();

          Swal.fire({
            title: 'kamu yakin ingin menghapus data tersebut ?',
            html: `
            <span class="d-block">Nama : ${nama}</span>
            <span class="d-block">Email : ${email}</span>`,
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
