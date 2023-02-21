<x-layouts.dashboard title="Jurnal Kelas">
  <x-slot:style>
    {{--  Custom styles for this page  --}}
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  </x-slot>
  <x-slot:body>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Jurnal Kelas</h6>
      </div>
      <div class="card-body">
        <h1 class="h3 text-gray-800 mb-2">Jurnal Kelas</h1>
        <span class="d-block">{{$semesterSekarang}}</span>
        @role('super-admin')
        <span class="d-block">Arsip Status : Belum Diarsip</span>
        @endrole

        @role('guru')
        <a href="{{ route('jurnal.create') }}" class="btn btn-success btn-icon-split my-3">
          <span class="text">Jurnal Baru</span>
        </a>
        @endrole

        @hasrole('super-admin')
        <div class="alert alert-info">
          Lakukan Pengarsipan setiap semester dengan cara tekan tombol 'arsipkan' di bawah untuk menyimpanyan menjadi arship
        </div>
        <form action="{{ route('jurnal.arship') }}" method="post">
          @csrf
          <a href="" class="btn btn-info btn-icon-split my-3">
            <span class="text">Laporan</span>
          </a>
          <button class="btn btn-primary">Arsipkan</button>
        </form>
        @endhasrole

        <div class="row">
          <div class="form-group col-md-2">
            <label for="kelas">Filter Kelas</label>
            <select class="custom-select" id="kelas" name="kelas">
              <option selected disabled value="">Pilih...</option>
              <option value="X">X</option>
              <option value="XI">XI</option>
              <option value="XII">XII</option>
            </select>
          </div>

          <div class="form-group col-md-3">
            <label for="jurusan">Filter Jurusan</label>
            <select class="custom-select" id="jurusan" name="jurusan">
              <option selected disabled value="">Pilih...</option>
              @foreach ($jurusan as $jur)
              <option value="{{$jur->id}}">{{$jur->nama}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="mataPelajaran">Filter Mata Pelajaran</label>
            <select class="custom-select" id="mataPelajaran" name="mataPelajaran">
              <option selected disabled value="">Pilih...</option>
              @foreach ($mataPelajaran as $mp)
              <option value="{{$mp->id}}">{{$mp->nama}}</option>
              @endforeach
            </select>
          </div>

        </div>

        <div class="table-responsive my-3">
          <table class="table table-bordered table-striped" id="jurnalKelas" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th scope="col">No</th>
              @role('super-admin')
              <th scope="col">Nama Guru</th>
              @endrole
              <th scope="col">Tanggal Mengajar</th>
              <th scope="col">Kelas</th>
              <th scope="col">Mata Pelajaran</th>
              <th scope="col">Jurusan</th>
              <th scope="col">Jam</th>
              <th scope="col">Materi</th>
              <th scope="col">Sakit</th>
              <th scope="col">Ijin</th>
              <th scope="col">Alpha</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th scope="col">No</th>
              @role('super-admin')
              <th scope="col">Nama Guru</th>
              @endrole
              <th scope="col">Tanggal Mengajar</th>
              <th scope="col">Kelas</th>
              <th scope="col">Mata Pelajaran</th>
              <th scope="col">Jurusan</th>
              <th scope="col">Jam</th>
              <th scope="col">Materi</th>
              <th scope="col">Sakit</th>
              <th scope="col">Ijin</th>
              <th scope="col">Alpha</th>
              <th scope="col">Aksi</th>
            </tr>
          </tfoot>
            <tbody>

            </tbody>
          </table>
        </div>

      </div>
    </div>

        {{-- modal hapus --}}
    <x-bootstrap.modal
      modalId="jurnal_kelas_modal"
      modalLabel="jurnalKelas_label"
      modalTitle="Jurnal kelas">
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

    {{-- swetalert library --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

      const routeGetKelas = "{{ route('jurnal.getdata') }}";

      $(document).ready(function() {

        let table = $('#jurnalKelas').DataTable({
          serverSide: true,
          processing: true,
          ajax: {
            "url" : routeGetKelas,
            "type": "GET",
            'data': function (data) {
              data.kelas          = $('#kelas').val(),
              data.jurusan        = $('#jurusan').val(),
              data.mataPelajaran  = $('#mataPelajaran').val()
            },
            error : function (xhr, error, code) {
              console.log(xhr, error, code);
            }
          },
          columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            @role('super-admin')
            {data: 'user.name', name: 'user.name'},
            @endrole
            {data: 'tanggal_ngajar', name: 'tanggal_ngajar'},
            {data: 'kelas', name: 'kelas'},
            {data: 'mata_pelajaran.nama', name: 'mata_pelajaran.nama'},
            {data: 'jurusan.nama', name: 'jurusan.nama'},
            {data: 'jam_ke', name: 'jam_ke'},
            {data: 'text_limit', name: 'text_limit'},
            {data: 'sakit', name: 'sakit'},
            {data: 'ijin', name: 'ijin'},
            {data: 'alpha', name: 'alpha'},
            {data: 'action', name: 'action', orderable: true, searchable: true},
          ],

        });

        $('.custom-select').on('change', function () {
          table.draw();
        });

      });

      $(document).ajaxComplete(function() {
        deleteData();
        showData();
      });

      // show

      function showData () {

        const allButtonShowJurnal = document.querySelectorAll('#show_jurnal');
        const modalBodyShow = document.querySelector('#modal_body_show');

        allButtonShowJurnal.forEach(buttonShowJurnal => {
          buttonShowJurnal.addEventListener('click', function () {

            const route = this.getAttribute('route-jurnal');

            loader(true);

            fetch(route)
              .then(res => res.json())
              .then(result => {
                displayData(result.jurnalKelas);
              });

          });
        });

        function displayData (result) {

          const {
            tanggal_ngajar,
            user,
            mata_pelajaran,
            jurusan,
            kelas,
            jam_ke,
            materi_pokok,
            sakit,
            ijin,
            alpha,
            tanggal_buat,
            tanggal_perbaharui
          } = result;

          loader(false);

          const element = `
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Semester
                <span>{{ $semesterSekarang }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Tanggal Mengajar
                <span>${tanggal_ngajar}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Nama Guru
                <span>
                  ${user.name}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Mata Pelajaran
                <span>${mata_pelajaran.nama}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Jurusan
                <span>${jurusan.nama}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Kelas
                <span>${kelas}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Jam
                <span>${jam_ke}</span>
              </li>
              <li class="list-group-item">
                Materi
              </li>
              <li class="list-group-item">
                ${materi_pokok}
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Sakit
                <span>${sakit}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Ijin
                <span>${ijin}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Alpha
                <span>${alpha}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Tanggal Buat
                <span>${tanggal_buat}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Tanggal Perbaharui
                <span>${tanggal_perbaharui}</span>
              </li>
            </ul>
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

      }

      function deleteData () {

        const allButtonHapusJurnalKelas = document.querySelectorAll('#hapus_jurnal_kelas');
        const allFormHapusJurnalKelas = document.querySelectorAll('#form_hapus_jurnal_kelas');

        allButtonHapusJurnalKelas.forEach((buttonJurnalKelas, index) => {

          buttonJurnalKelas.addEventListener('click', function (e) {
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
                allFormHapusJurnalKelas[index].submit();
              }
            })

          });

        });

      }

    </script>
  </x-slot>
</x-layouts>
