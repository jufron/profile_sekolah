<x-layouts.dashboard title="Social Media">
  <x-slot:body>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Social Media</h6>
      </div>
      <div class="card-body">
        <h1 class="h3 mb-0 text-gray-800 mb-2">Social Media</h1>
        <a href="{{ route('social_media.create') }}" class="btn btn-success btn-icon-split my-3">
          <span class="text">Tambah</span>
        </a>

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
            <th>No</th>
              <th>logo</th>
              <th>nama</th>
              <th>Terkhir Dibuat</th>
              <th>Terkhir Diperbaharui</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>logo</th>
              <th>nama</th>
              <th>Terkhir Dibuat</th>
              <th>Terkhir Diperbaharui</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
            <tbody>
              @foreach ($social_media_link as $sosmed)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <a href="{{ $sosmed->link }}" style="text-decoration: none;" class="text-secondary" target="_blank">
                    {!! $sosmed->social_media->logo_medium !!}
                  </a>
                </td>
                <td>{{ $sosmed->social_media->nama }}</td>
                <td>{{ $sosmed->tanggal_buat }}</td>
                <td>{{ $sosmed->tanggal_perbaharui }}</td>
                <td>
                  <form id="form_hapus_social_media" action="{{ route('social_media.destroy', $sosmed) }}" method="POST">
                    @method('delete')
                    @csrf
                    <a href="{{ route('social_media.edit', $sosmed) }}" class="btn btn-warning btn-circle btn-sm">
                        <i class="fas fa-exclamation-triangle"></i>
                    </a>
                    <button onclick="return false" id="hapus_social_media" class="btn btn-danger btn-circle btn-sm" data-nama="{{ $sosmed->social_media->nama }}">
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

      const allFormHapusSocialMedia = document.querySelectorAll('#form_hapus_social_media');
      const buttonHapusSocialMedia = document.querySelectorAll('#hapus_social_media');

      buttonHapusSocialMedia.forEach((buttonSocialMediaLink, index) => {

        const nama = buttonSocialMediaLink.getAttribute('data-nama');

        buttonSocialMediaLink.addEventListener('click', function (e) {
          e.preventDefault();

          Swal.fire({
            title: 'kamu yakin ingin menghapus data tersebut ?',
            text: `Nama social media : ${nama}`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.isConfirmed) {
              allFormHapusSocialMedia[index].submit();
            }
          });

        });
      });

    </script>
  </x-slot>
</x-layouts>
