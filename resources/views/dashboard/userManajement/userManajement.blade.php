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
              <th>email</th>
              <th>Terkhir Dibuat</th>
              <th>Terkhir Diperbaharui</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
            <tbody>
              @foreach ($user as $u)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->tanggal_buat }}</td>
                <td>{{ $u->tanggal_perbaharui }}</td>
                <td>
                  <form id="form_hapus_user" action="{{ route('user-manajement.destroy', $u) }}" method="POST">
                    @method('delete')
                    @csrf
                    <a href="{{ route('user-manajement.edit', $u) }}" class="btn btn-warning btn-circle btn-sm">
                        <i class="fas fa-exclamation-triangle"></i>
                    </a>
                    <button onclick="return false" id="hapus_user" class="btn btn-danger btn-circle btn-sm">
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
</x-layouts>
